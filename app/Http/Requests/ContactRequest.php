<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Validation\Validator;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:120', 'regex:/^[\p{L}\p{M}\s\'\.\-]+$/u'],
            'last_name' => ['required', 'string', 'max:120', 'regex:/^[\p{L}\p{M}\s\'\.\-]+$/u'],
            'phone' => ['nullable', 'string', 'max:40'],
            'email' => ['required', 'string', 'email:filter,rfc', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'company' => ['nullable', 'string', 'max:0'],
            'form_started_at' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'company.max' => 'Unable to submit this form.',
            'form_started_at.required' => 'Please refresh the page and try again.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $merge = [];
        foreach (['first_name', 'last_name', 'phone', 'email', 'message'] as $key) {
            $value = $this->input($key);
            if (is_string($value)) {
                $clean = str_replace(["\0"], '', $value);
                $merge[$key] = trim(strip_tags($clean));
            }
        }
        $this->merge($merge);
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            if ($validator->errors()->isNotEmpty()) {
                return;
            }

            $message = (string) $this->input('message', '');
            $urlCount = preg_match_all('/https?:\/\/\S+/i', $message) ?: 0;
            $maxUrls = (int) config('contact.max_urls_in_message', 6);
            if ($urlCount > $maxUrls) {
                $validator->errors()->add(
                    'message',
                    'Please include no more than '.$maxUrls.' links in your message.',
                );
            }

            $start = $this->integer('form_started_at');
            $nowMs = (int) round(microtime(true) * 1000);
            $skew = (int) config('contact.clock_skew_ms', 120_000);
            $minFill = (int) config('contact.min_fill_ms', 3000);
            $maxAge = (int) config('contact.max_form_age_ms', 3_600_000);

            if ($start > $nowMs + $skew) {
                $validator->errors()->add('form_started_at', 'Please refresh the page and try again.');
            } elseif ($start < $nowMs - $maxAge) {
                $validator->errors()->add('form_started_at', 'This form has expired. Please refresh the page and try again.');
            } elseif ($start > $nowMs - $minFill) {
                $validator->errors()->add(
                    'form_started_at',
                    'Please wait a moment after opening the form before sending.',
                );
            }
        });
    }

    /**
     * @return array{first_name: string, last_name: string, phone: string|null, email: string, message: string}
     */
    public function contactPayload(): array
    {
        /** @var array<string, mixed> $data */
        $data = Arr::only(
            parent::validated(),
            ['first_name', 'last_name', 'phone', 'email', 'message']
        );

        $phone = $data['phone'] ?? null;

        return [
            'first_name' => (string) $data['first_name'],
            'last_name' => (string) $data['last_name'],
            'phone' => is_string($phone) && $phone !== '' ? $phone : null,
            'email' => (string) $data['email'],
            'message' => (string) $data['message'],
        ];
    }
}

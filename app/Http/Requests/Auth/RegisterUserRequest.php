<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Validator;

class RegisterUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\p{M}\s\'\.\-]+$/u'],
            'email' => ['required', 'string', 'lowercase', 'email:filter,rfc', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'website' => ['nullable', 'string', 'max:0'],
            'form_started_at' => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages(): array
    {
        return [
            'website.max' => 'Unable to submit this form.',
            'form_started_at.required' => 'Please refresh the page and try again.',
            'email.unique' => 'This email already has a pending or existing account. Try signing in, or contact the church office if you need help.',
        ];
    }

    protected function prepareForValidation(): void
    {
        $name = $this->input('name');
        if (is_string($name)) {
            $this->merge([
                'name' => trim(str_replace(["\0"], '', strip_tags($name))),
            ]);
        }
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            if ($validator->errors()->isNotEmpty()) {
                return;
            }

            $start = $this->integer('form_started_at');
            $nowMs = (int) round(microtime(true) * 1000);
            $skew = (int) config('registration.clock_skew_ms', 120_000);
            $minFill = (int) config('registration.min_fill_ms', 3_000);
            $maxAge = (int) config('registration.max_form_age_ms', 3_600_000);

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
}

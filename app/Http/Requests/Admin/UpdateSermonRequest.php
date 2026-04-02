<?php

namespace App\Http\Requests\Admin;

use App\Support\VideoEmbed;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateSermonRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:5000'],
            'video_url' => ['required', 'string', 'max:2048', 'url'],
            'published_at' => ['nullable', 'date'],
        ];
    }

    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator): void {
            $url = $this->input('video_url');
            if (! is_string($url) || ! VideoEmbed::isAllowedVideoUrl($url)) {
                $validator->errors()->add(
                    'video_url',
                    'Use a supported YouTube or Vimeo link (watch page, youtu.be, or Vimeo video URL).',
                );
            }
        });
    }
}

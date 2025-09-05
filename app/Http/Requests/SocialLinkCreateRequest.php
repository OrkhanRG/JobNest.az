<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialLinkCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "facebook" => ["sometimes", "nullable", "url"],
            "twitter" => ["sometimes", "nullable", "url"],
            "linkedin" => ["sometimes", "nullable", "url"],
            "whatsapp" => ["sometimes", "nullable", "url"],
            "instagram" => ["sometimes", "nullable", "url"],
            "youtube" => ["sometimes", "nullable", "url"]
        ];
    }
}

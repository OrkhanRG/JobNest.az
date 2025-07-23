<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class ContentTranslationCreateRequest extends FormRequest
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
            "key" => [
                "required",
                "string",
                "max:255",
                Rule::unique('content_translations')
                    ->where(fn ($query) =>
                        $query->where('group', $this->group)
                            ->where('lang_id', $this->lang_id)
                    )
            ],
            "group" => ["required", "string", "max:255"],
            "value" => ["required"],
            "lang_id" => ["required", "integer", "exists:languages,id"]
        ];
    }
}

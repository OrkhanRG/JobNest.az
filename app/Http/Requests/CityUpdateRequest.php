<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class CityUpdateRequest extends FormRequest
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
            "name" => ["required", "string", "max:255"],
            "short_name" => ["required", "string"],
            "phone_prefix" => ["sometimes", "nullable", "regex:/^\d{1,4}$/"],
            "lang_id" => ["required", "integer", "exists:languages,id"]
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'phone_prefix' => $this->phone_prefix ? str_replace(["+", "_"], "", $this->phone_prefix) : null,
        ]);
    }
}

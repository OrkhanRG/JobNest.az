<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobCategoryCreateRequest extends FormRequest
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
            "slug" => ["sometimes", "nullable", "string", "max:255", "unique:job_categories,slug"],
            "description" => ["sometimes", "nullable", "string", "max:255"],
            "parent_id" => ["sometimes", "nullable", "numeric", "min:1"],
            "icon" => ["sometimes", "nullable", "file", "image", "mimes:jpeg,png,jpg,gif,svg", "max:2048"],
        ];
    }
}

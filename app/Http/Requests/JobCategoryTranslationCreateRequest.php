<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobCategoryTranslationCreateRequest extends FormRequest
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
            "lang_id" => [
                "required",
                "integer",
                "exists:languages,id",
                Rule::unique('job_category_translations')
                    ->where(fn($q) => $q->where('job_category_id', $this->job_category_id)),
            ],
            "job_category_id" => "required|integer|exists:job_categories,id",
            "name" => ["required", "string", "max:255"],
        ];
    }
}

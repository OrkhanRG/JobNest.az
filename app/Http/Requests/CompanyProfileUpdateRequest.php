<?php

namespace App\Http\Requests;

use App\Enums\CompanyIndustry;
use App\Enums\CompanySize;
use App\Enums\CompanyType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rules\Password;

class CompanyProfileUpdateRequest extends FormRequest
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
            "email" => ["required", "email", "max:255", "unique:users,email," . auth()->id()],
            'website' => ["sometimes", "nullable", "url", "max:255"],
            'country_id' => ["sometimes", "nullable", "exists:countries,id"],
            'city_id' => ["sometimes", "nullable", "exists:cities,id"],
            'latitude' => ["sometimes", "nullable", "numeric"],
            'longitude' => ["sometimes", "nullable", "numeric"],
            'map_address' => ["sometimes", "nullable", "string", "max:500"],
            'industry' => ["sometimes", "nullable", new Enum(CompanyIndustry::class)],
            'company_type' => ["sometimes", "nullable", new Enum(CompanyType::class)],
            'company_size' => ["sometimes", "nullable", new Enum(CompanySize::class)],
            'description' => ["sometimes", "nullable", "string", "max:500"],
            'logo' => ["sometimes", "nullable", "image", "mimes:jpeg,png,jpg,webp", "max:5120"],
            'background_image' => ["sometimes", "nullable", "image", "mimes:jpeg,png,jpg,webp", "max:5120"],
        ];
    }
}

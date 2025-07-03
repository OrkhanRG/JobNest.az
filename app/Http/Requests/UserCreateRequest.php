<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UserCreateRequest extends FormRequest
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
            "surname" => ["sometimes", "nullable", "string", "max:255"],
            "email" => ["required", "email", "max:255", "unique:users,email"],
            "password" => ["required", Password::min(8)->mixedCase()->letters()->numbers()->symbols()],
            "password_confirmation" => ["required", "same:password"],
            "role" => ["required", "exists:roles,name"],
            "status" => ["required"],
            "avatar" => ["sometimes", "nullable", "file", "image", "mimes:jpeg,png,jpg,gif,svg", "max:2048"],
        ];
    }
}

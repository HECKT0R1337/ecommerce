<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
            'name' => 'required|min:3|max:255',
        ];
    }

    public function messages()
    {
        return[
            'email.required' => 'Email is Required',
            'password.required' => 'Password is Required',
            'password.min' => 'Password must be 6 chars or above!',
            'name.required' => 'Name is Required',
            'name.min' => 'Name must be 3 chars or above!',
        ];
    }
}

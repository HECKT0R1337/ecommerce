<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubCategoryRequest extends FormRequest
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
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'slug.required' => 'Slug is required',
            'status.required' => 'Status is required',
            'category_id.required' => 'Category is required',
            'meta_title.required' => 'Meta Title is required',
            'meta_description.required' => 'Meta Description is required',
        ];
    }
}

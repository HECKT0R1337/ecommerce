<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubCategoryRequest extends FormRequest
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
            'name' => 'required|min:3',
            'slug' => 'required|min:2',
            'category_id' => 'required',
            'meta_title' => 'required|min:5',
            'meta_description' => 'required|min:5',
            'meta_keywords' => 'required|min:5',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 3 characters',
            'slug.required' => 'Slug is required',
            'slug.min' => 'Slug must be at least 2 characters',
            'category_id.required' => 'Category is required',
            'meta_title.required' => 'Meta Title is required',
            'meta_title.min' => 'Meta Title must be at least 5 characters',
            'meta_description.required' => 'Meta Description is required',
            'meta_description.min' => 'Meta Description must be at least 5 characters',
            'meta_keywords.required' => 'Meta Keywords is required',
            'meta_keywords.min' => 'Meta Keywords must be at least 5 characters',
        ];
    }
}

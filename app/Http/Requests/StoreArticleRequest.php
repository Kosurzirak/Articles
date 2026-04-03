<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'nullable',
            'category_id' => 'nullable:exists:categories,id|required_without:new_category_name',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'new_category_name' => 'max:255|required_without:category_id',
            'is_premium' => 'required|boolean'
        ];
    }
}

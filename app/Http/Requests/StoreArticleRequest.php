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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
                'title' => 'required|max:255',
                'slug' => 'required|unique:articles,slug',
                'thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // example validation for image upload
                'body' => 'required',
                'category_id' => 'required',
                'status' => 'required',
        ];
    }
}

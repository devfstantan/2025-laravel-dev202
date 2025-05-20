<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'title' => 'required|min:3|max:255',
            'price' => 'required|numeric|min:0|max:1000000',
            'stock' => 'required|integer|min:0|max:999999',
            'date_expiration' => 'nullable|date',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|file|image|max:2048', // MAX:2Mo
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'l3ounwan darouri ikoun 3amr'
        ];
    }
}

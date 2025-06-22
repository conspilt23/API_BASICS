<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'unique:products,name'],
            'description' => ['sometimes', 'nullable', 'string'],
            'price' => ['sometimes', 'required', 'numeric', 'min:0'],
            'currency_id' => ['sometimes', 'required', 'integer', 'exists:currencies,id'],
            'tax_cost' => ['sometimes', 'required', 'numeric', 'min:0'],
            'manufacturing_cost' => ['sometimes', 'required', 'numeric', 'min:0'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
        public function messages(): array
    {
        return [
            'name.required' => 'The product name is required.',
            'name.unique' => 'A product with this name already exists.',
            'price.required' => 'The product price is required.',
            'price.numeric' => 'The price must be a valid number.',
            'price.min' => 'The price must be greater than or equal to 0.',
            'currency_id.required' => 'The currency is required.',
            'currency_id.exists' => 'The selected currency does not exist.',
            'tax_cost.required' => 'The tax cost is required.',
            'tax_cost.numeric' => 'The tax cost must be a valid number.',
            'tax_cost.min' => 'The tax cost must be greater than or equal to 0.',
            'manufacturing_cost.required' => 'The manufacturing cost is required.',
            'manufacturing_cost.numeric' => 'The manufacturing cost must be a valid number.',
            'manufacturing_cost.min' => 'The manufacturing cost must be greater than or equal to 0.',
        ];
}
}
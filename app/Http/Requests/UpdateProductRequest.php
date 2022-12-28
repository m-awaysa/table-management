<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'price' => ['required', 'Numeric'],
            'amount' => ['required', 'Numeric', 'min:0'],
            'discount' => ['required', 'Numeric', 'max:255'],
            'description' => ['required', 'min:3', 'max:255'],
            'company' => ['required', 'max:255'],
            'name' => ['required', 'min:3', 'max:255'],
            'color' => ['required', 'min:3', 'max:255'],
        ];
    }
}

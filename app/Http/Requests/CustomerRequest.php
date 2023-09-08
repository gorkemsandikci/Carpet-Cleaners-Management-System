<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'first_name' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Başlık alanı zorunludur',
            'address.required' => 'Adres alanı zorunludur',
            'phone.required' => 'Telefon alanı zorunludur'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestOfPaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required','exists:users,id'],
            'category_id' => ['required','exists:payment_categories,id'],
            'description' => ['required'],
            'amount' => ['required','numeric'],
            'file_path' => ['nullable','file','mimes:pdf,jpg,png,jpeg','max:2048'],
            'shaba_number' =>['required',Rule::unique('employees')->ignore($this->request->get('id')),'numeric','digits:24'],
            'national_code' =>['required',Rule::unique('employees')->ignore($this->request->get('id')),'numeric','digits:10']
        ];
    }
}

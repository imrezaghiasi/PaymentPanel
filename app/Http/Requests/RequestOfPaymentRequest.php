<?php

namespace App\Http\Requests;

use App\Rules\CheckShabaNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RequestOfPaymentRequest extends FormRequest
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
            'category_id' => ['required','exists:payment_categories,id'],
            'request_description' => ['required'],
            'amount' => ['required','numeric'],
            'file_path' => ['nullable','file','mimes:pdf,jpg,png,jpeg','max:2048'],
            'shaba_number' =>['required',new CheckShabaNumber(),Rule::unique('payment_requests','shaba_number')->ignore($this->payment_request),'numeric','digits:24'],
            'national_code' =>['required',Rule::unique('payment_requests','national_code')->ignore($this->payment_request),'numeric','digits:10']
        ];
    }
}

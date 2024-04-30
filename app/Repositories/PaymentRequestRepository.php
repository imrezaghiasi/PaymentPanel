<?php

namespace App\Repositories;

use App\Http\Requests\RequestOfPaymentRequest;
use App\Models\PaymentRequest;
use App\Repositories\Interfaces\PaymentRequestRepositoryInterface;
use Illuminate\Http\Request;

class PaymentRequestRepository implements PaymentRequestRepositoryInterface
{
    private PaymentRequest $paymentRequest;
    public function __construct(PaymentRequest $paymentRequest)
    {
        $this->paymentRequest = $paymentRequest;
    }

    public function all(Request $request = null) {
        return $this->paymentRequest->with('user','payment_category')->get();
    }

    public function delete(PaymentRequest $paymentRequest) {
        $paymentRequest->delete();
    }

    public function store(RequestOfPaymentRequest $request) {
        return $this->paymentRequest->create([
            'user_id'=> $request->user_id,
            'category_id' => $request->category_id,
            'request_description' => $request->request_description,
            'reject_description' => $request->reject_description,
            'status' => $request->status,
            'amount' => $request->amount,
            'shaba_number' => $request->shaba_number,
            'national_code' => $request->national_code,
        ]);
    }

    public function update(PaymentRequest $paymentRequest, RequestOfPaymentRequest $request) {
        $paymentRequest->user_id = $request->user_id;
        $paymentRequest->category_id = $request->category_id;
        $paymentRequest->request_description = $request->request_description;
        $paymentRequest->reject_description = $request->reject_description;
        $paymentRequest->status = $request->status;
        $paymentRequest->amount = $request->amount;
        $paymentRequest->shaba_number = $request->shaba_number;
        $paymentRequest->national_code = $request->national_code;
        $paymentRequest->update();
    }
}

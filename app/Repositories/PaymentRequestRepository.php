<?php

namespace App\Repositories;

use App\Events\RequestReject;
use App\Http\Requests\RequestOfPaymentRequest;
use App\Models\PaymentRequest;
use App\Repositories\Interfaces\PaymentRequestRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentRequestRepository implements PaymentRequestRepositoryInterface
{
    private PaymentRequest $paymentRequest;
    public function __construct(PaymentRequest $paymentRequest)
    {
        $this->paymentRequest = $paymentRequest;
    }

    public function all(Request $request = null) {
        $query = $this->paymentRequest->with('user','payment_category');

        if (!auth()->user()->hasRole('admin')) {
            $query->where('user_id', auth()->user()->id);
        }

        return $query->get();
    }

    public function delete(PaymentRequest $paymentRequest) {
        $paymentRequest->delete();
    }

    public function store(RequestOfPaymentRequest $request) {
        $payment_request = $this->paymentRequest->create([
            'user_id'=> Auth::id(),
            'category_id' => $request->category_id,
            'request_description' => $request->request_description,
            'status' => 2,
            'amount' => $request->amount,
            'shaba_number' => $request->shaba_number,
            'national_code' => $request->national_code,
        ]);

        if ($request->file('file_path')){
            $file_name = time() . '_' . $request->file('file_path')->getClientOriginalName();
            $file_path = $request->file('file_path')->storeAs('payment_requests', $file_name, 'public');
            $payment_request->file_path = $file_path;
        }

        $payment_request->save();



    }

    public function update(PaymentRequest $paymentRequest, RequestOfPaymentRequest $request) {
        $paymentRequest->category_id = $request->category_id;
        $paymentRequest->request_description = $request->request_description;
        $paymentRequest->amount = $request->amount;
        $paymentRequest->shaba_number = $request->shaba_number;
        $paymentRequest->national_code = $request->national_code;
        if ($request->file('file_path')){
            $file_name = time() . '_' . $request->file('file_path')->getClientOriginalName();
            $file_path = $request->file('file_path')->storeAs('payment_requests', $file_name, 'public');
            $paymentRequest->file_path = $file_path;
        }
        $paymentRequest->update();
    }

    public function getConfirmed()
    {
        return $this->paymentRequest->select('shaba_number','status','amount')->where('status','1')->get();
    }
}

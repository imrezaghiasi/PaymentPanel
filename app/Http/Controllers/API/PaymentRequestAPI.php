<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestOfPaymentRequest;
use App\Models\PaymentRequest;
use App\Services\PaymentRequestService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentRequestAPI extends Controller
{
    private readonly PaymentRequestService $paymentRequestService;

    public function __construct(PaymentRequestService $paymentRequestService){
        $this->paymentRequestService = $paymentRequestService;
    }
    public function index()
    {
        return response()->json(PaymentRequest::all());
    }

    public function store(Request $request)
    {
        $payment_request = PaymentRequest::create([
            'user_id'=> $request->user_id,
            'category_id' => $request->category_id,
            'request_description' => $request->request_description,
            'status' => 2,
            'amount' => $request->amount,
            'shaba_number' => $request->shaba_number,
            'national_code' => $request->national_code,
        ]);

        return response()->json([$payment_request,'message' => 'درخواست شما با موفقیت ثبت شد'],201);
    }
}

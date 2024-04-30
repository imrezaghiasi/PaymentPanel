<?php

namespace App\Services;

use App\Http\Requests\RequestOfPaymentRequest;
use App\Models\PaymentRequest;
use App\Repositories\PaymentRequestRepository;
use Illuminate\Http\Request;

class PaymentRequestService
{
    protected PaymentRequestRepository $paymentRequestRepository;
    public function __construct(PaymentRequestRepository $paymentRequestRepository)
    {
        $this->paymentRequestRepository = $paymentRequestRepository;
    }

    public function all(Request $request = null)
    {
        return $this->paymentRequestRepository->all($request);
    }

    public function store(RequestOfPaymentRequest $request){
        return $this->paymentRequestRepository->store($request);
    }

    public function update(PaymentRequest $paymentRequest,RequestOfPaymentRequest $request){
        return $this->paymentRequestRepository->update($paymentRequest, $request);
    }
    public function delete(PaymentRequest $paymentRequest){
        return $this->paymentRequestRepository->delete($paymentRequest);
    }
}

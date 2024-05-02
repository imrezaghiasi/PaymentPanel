<?php

namespace App\Services;

use App\Http\Requests\RequestOfPaymentRequest;
use App\Models\PaymentRequest;
use App\Repositories\Interfaces\PaymentRequestRepositoryInterface;
use App\Repositories\PaymentRequestRepository;
use Illuminate\Http\Request;

class PaymentRequestService
{
    protected PaymentRequestRepositoryInterface $paymentRequestRepository;
    public function __construct(PaymentRequestRepositoryInterface $paymentRequestRepository)
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

    public function getConfirmed()
    {
        return $this->paymentRequestRepository->getConfirmed();
    }
}

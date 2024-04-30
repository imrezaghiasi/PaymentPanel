<?php

namespace App\Services;
use App\Http\Requests\PaymentStatusRequest;
use App\Models\PaymentStatus;
use App\Repositories\PaymentStatusRepository;
use App\Services\Interfaces\PaymentStatusServiceInterface;
use Illuminate\Http\Request;

class PaymentStatusService
{
    protected PaymentStatusRepository $paymentStatusRepository;
    public function __construct(PaymentStatusRepository $paymentStatusRepository)
    {
        $this->paymentStatusRepository = $paymentStatusRepository;
    }

    public function all(Request $request = null)
    {
        return $this->paymentStatusRepository->all($request);
    }

    public function store(PaymentStatusRequest $request){
        return $this->paymentStatusRepository->store($request);
    }

    public function update(PaymentStatus $paymentStatus,PaymentStatusRequest $request){
        return $this->paymentStatusRepository->update($paymentStatus, $request);
    }
    public function delete(PaymentStatus $paymentStatus){
        return $this->paymentStatusRepository->delete($paymentStatus);
    }
}

<?php

namespace App\Repositories;

use App\Http\Requests\PaymentStatusRequest;
use App\Models\PaymentStatus;
use App\Repositories\Interfaces\PaymentStatusRepositoryInterface;
use Illuminate\Http\Request;

class PaymentStatusRepository implements PaymentStatusRepositoryInterface
{
    private PaymentStatus $paymentStatus;
    public function __construct(PaymentStatus $paymentStatus)
    {
        $this->paymentStatus = $paymentStatus;
    }


    public function all(Request $request = null) {
        return $this->paymentStatus->with('payment_request')->get();
    }
    public function delete(PaymentStatus $paymentStatus) {
        $paymentStatus->delete();
    }

    public function store(PaymentStatusRequest $request) {
        $this->paymentStatus->create([
            'request_id' => $request->request_id,
            'description_of_reject' => $request->description_of_reject,
            'status' => $request->status
        ]);
    }

    public function update(PaymentStatus $paymentStatus, PaymentStatusRequest $request) {
        $paymentStatus->request_id = $request->request_id;
        $paymentStatus->status = $request->status;
        $paymentStatus->description_of_reject = $request->description_of_reject;
        $paymentStatus->update();
    }
}

<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\RequestOfPaymentRequest;
use App\Models\PaymentRequest;
use Illuminate\Http\Request;

interface PaymentRequestRepositoryInterface
{
    public function all(Request $request = null);
    public function store(RequestOfPaymentRequest $request);
    public function update(PaymentRequest $paymentRequest, RequestOfPaymentRequest $request);
    public function delete(PaymentRequest $paymentRequest);

    public function getConfirmed();
}

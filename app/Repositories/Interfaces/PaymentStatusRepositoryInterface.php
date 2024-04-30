<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\PaymentStatusRequest;
use App\Models\PaymentStatus;
use Illuminate\Http\Request;

interface PaymentStatusRepositoryInterface
{
    public function all(Request $request = null);
    public function store(PaymentStatusRequest $request);
    public function update(PaymentStatus $paymentStatus, PaymentStatusRequest $request);
    public function delete(PaymentStatus $paymentStatus);
}

<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\PaymentCategoryRequest;
use App\Models\PaymentCategory;
use Illuminate\Http\Request;


interface PaymentCategoryRepositoryInterface
{
    public function all(Request $request = null);
    public function store(PaymentCategoryRequest $request);
    public function update(PaymentCategory $paymentCategory, PaymentCategoryRequest $request);
    public function delete(PaymentCategory $paymentCategory);
}

<?php

namespace App\Services;

use App\Http\Requests\PaymentCategoryRequest;
use App\Models\PaymentCategory;
use App\Repositories\PaymentCategoryRepository;
use Illuminate\Http\Request;

class PaymentCategoryService
{
    protected PaymentCategoryRepository $paymentCategoryRepository;
    public function __construct(PaymentCategoryRepository $paymentCategoryRepository)
    {
        $this->paymentCategoryRepository = $paymentCategoryRepository;
    }

    public function all(Request $request = null)
    {
        return $this->paymentCategoryRepository->all($request);
    }

    public function store(PaymentCategoryRequest $request){
        return $this->paymentCategoryRepository->store($request);
    }

    public function update(PaymentCategory $paymentCategory,PaymentCategoryRequest $request){
        return $this->paymentCategoryRepository->update($paymentCategory, $request);
    }
    public function delete(PaymentCategory $paymentCategory){
        return $this->paymentCategoryRepository->delete($paymentCategory);
    }
}

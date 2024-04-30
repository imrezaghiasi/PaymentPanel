<?php

namespace App\Repositories;

use App\Http\Requests\PaymentCategoryRequest;
use App\Models\PaymentCategory;
use App\Repositories\Interfaces\PaymentCategoryRepositoryInterface;
use Illuminate\Http\Request;

class PaymentCategoryRepository implements PaymentCategoryRepositoryInterface
{
    protected $paymentCategory;
    public function __construct(PaymentCategory $paymentCategory)
    {
        $this->paymentCategory = $paymentCategory;
    }

    public function all(Request $request = null) {
        return $this->paymentCategory->select('id','name')->get();
    }

    public function delete(PaymentCategory $paymentCategory) {
        $paymentCategory->delete();
    }

    public function store(PaymentCategoryRequest $request) {
        return $this->paymentCategory->create([
            'name'=> $request->name
        ]);
    }

    public function update(PaymentCategory $paymentCategory, PaymentCategoryRequest $request) {
        $paymentCategory->name = $request->name;
        $paymentCategory->update();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentCategoryRequest;
use App\Models\PaymentCategory;
use App\Services\PaymentCategoryService;

class PaymentCategoryController extends Controller
{
    private string $redirectRoute = 'paymentCategory.index';
    private readonly PaymentCategoryService $paymentCategoryService;
    public function __construct(PaymentCategoryService $paymentCategoryService){
        $this->paymentCategoryService = $paymentCategoryService;
    }
    public function index()
    {
        $paymentCategories = $this->paymentCategoryService->all();
        return view("paymentCategory.index", compact('paymentCategories'));
    }


    public function create()
    {
        return view('paymentCategory.create');
    }


    public function store(PaymentCategoryRequest $request)
    {
        $this->paymentCategoryService->store($request);
        return redirect()->route($this->redirectRoute);
    }

    public function show(PaymentCategory $paymentCategory)
    {
        //
    }


    public function edit(PaymentCategory $paymentCategory)
    {
        return view('paymentCategory.edit', compact('paymentCategory'));
    }


    public function update(PaymentCategoryRequest $request, PaymentCategory $paymentCategory)
    {
        $this->paymentCategoryService->update($paymentCategory,$request);
        return redirect()->route($this->redirectRoute);
    }


    public function destroy(PaymentCategory $paymentCategory)
    {
        $this->paymentCategoryService->delete($paymentCategory);
        return redirect()->route($this->redirectRoute);
    }
}

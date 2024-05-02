<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentCategoryRequest;
use App\Models\PaymentCategory;
use App\Services\PaymentCategoryService;

class PaymentCategoryController extends Controller
{
    protected $redirectRoute = 'payment_category.';
    protected $viewPath = 'pages.payment_category.';
    private readonly PaymentCategoryService $paymentCategoryService;
    public function __construct(PaymentCategoryService $paymentCategoryService){
        $this->paymentCategoryService = $paymentCategoryService;
    }
    public function index()
    {
        $payment_categories = $this->paymentCategoryService->all();
        return view($this->viewPath."index", compact('payment_categories'));
    }


    public function create()
    {
        return view($this->viewPath.'create');
    }


    public function store(PaymentCategoryRequest $request)
    {
        $this->paymentCategoryService->store($request);
        return redirect()->route($this->redirectRoute."index");
    }

    public function show(PaymentCategory $paymentCategory)
    {
        //
    }


    public function edit(PaymentCategory $payment_category)
    {
        return view($this->viewPath."edit", compact('payment_category'));
    }


    public function update(PaymentCategoryRequest $request, PaymentCategory $paymentCategory)
    {
        $this->paymentCategoryService->update($paymentCategory,$request);
        return redirect()->route($this->redirectRoute.'index');
    }


    public function destroy(PaymentCategory $paymentCategory)
    {
        $this->paymentCategoryService->delete($paymentCategory);
        return redirect()->route($this->redirectRoute.'index');
    }
}

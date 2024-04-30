<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestOfPaymentRequest;
use App\Models\PaymentRequest;
use App\Services\PaymentRequestService;

class PaymentRequestController extends Controller
{
    private string $redirectRoute = 'paymentRequest.index';
    private readonly PaymentRequestService $paymentRequestService;
    public function __construct(PaymentRequestService $paymentRequestService){
        $this->paymentRequestService = $paymentRequestService;
    }
    public function index()
    {
        $paymentCategories = $this->paymentRequestService->all();
        return view("paymentRequest.index", compact('paymentCategories'));
    }


    public function create()
    {
        return view('paymentRequest.create');
    }


    public function store(RequestOfPaymentRequest $request)
    {
        $this->paymentRequestService->store($request);
        return redirect()->route($this->redirectRoute);
    }

    public function show(PaymentRequest $paymentRequest)
    {
        //
    }


    public function edit(PaymentRequest $paymentRequest)
    {
        return view('paymentRequest.edit', compact('paymentRequest'));
    }


    public function update(RequestOfPaymentRequest $request, PaymentRequest $paymentRequest)
    {
        $this->paymentRequestService->update($paymentRequest,$request);
        return redirect()->route($this->redirectRoute);
    }


    public function destroy(PaymentRequest $paymentRequest)
    {
        $this->paymentRequestService->delete($paymentRequest);
        return redirect()->route($this->redirectRoute);
    }
}

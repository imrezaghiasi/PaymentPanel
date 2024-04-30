<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentStatusRequest;
use App\Models\PaymentStatus;
use App\Services\PaymentStatusService;
use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    private string $redirectRoute = 'paymentStatus.index';
    private readonly PaymentStatusService $paymentStatusService;
    public function __construct(PaymentStatusService $paymentStatusService){
        $this->paymentStatusService = $paymentStatusService;
    }
    public function index()
    {
        $paymentCategories = $this->paymentStatusService->all();
        return view("paymentStatus.index", compact('paymentCategories'));
    }


    public function create()
    {
        return view('paymentStatus.create');
    }


    public function store(PaymentStatusRequest $request)
    {
        $this->paymentStatusService->store($request);
        return redirect()->route($this->redirectRoute);
    }

    public function show(PaymentStatus $paymentStatus)
    {
        //
    }


    public function edit(PaymentStatus $paymentStatus)
    {
        return view('paymentStatus.edit', compact('paymentStatus'));
    }


    public function update(PaymentStatusRequest $request, PaymentStatus $paymentStatus)
    {
        $this->paymentStatusService->update($paymentStatus,$request);
        return redirect()->route($this->redirectRoute);
    }


    public function destroy(PaymentStatus $paymentStatus)
    {
        $this->paymentStatusService->delete($paymentStatus);
        return redirect()->route($this->redirectRoute);
    }
}

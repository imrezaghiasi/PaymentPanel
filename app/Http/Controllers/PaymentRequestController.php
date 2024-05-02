<?php

namespace App\Http\Controllers;

use App\Events\RequestReject;
use App\Http\Requests\RequestOfPaymentRequest;
use App\Models\PaymentRequest;
use App\Services\PaymentCategoryService;
use App\Services\PaymentRequestService;
use Illuminate\Support\Facades\Auth;

class PaymentRequestController extends Controller
{
    protected $redirectRoute = 'payment_request.';
    protected $viewPath = 'pages.payment_request.';
    private readonly PaymentRequestService $paymentRequestService;
    private readonly PaymentCategoryService $paymentCategoryService;
    public function __construct(PaymentRequestService $paymentRequestService, PaymentCategoryService $paymentCategoryService)
    {
        $this->paymentRequestService = $paymentRequestService;
        $this->paymentCategoryService = $paymentCategoryService;
    }
    public function index()
    {
        $payment_requests = $this->paymentRequestService->all();
//        dd($payment_requests);
        return view($this->viewPath . 'index', compact('payment_requests'));
    }


    public function create()
    {
        $categories = $this->paymentCategoryService->all();
        return view($this->viewPath . 'create', compact('categories'));
    }


    public function store(RequestOfPaymentRequest $request)
    {
        $this->paymentRequestService->store($request);
        return redirect()->route($this->redirectRoute . 'index');
    }

    public function show(PaymentRequest $paymentRequest)
    {
        //
    }


    public function edit(PaymentRequest $payment_request)
    {
        $categories = $this->paymentCategoryService->all();
        return view($this->viewPath . 'edit', compact('payment_request','categories'));
    }


    public function update(RequestOfPaymentRequest $request, PaymentRequest $paymentRequest)
    {
        $this->paymentRequestService->update($paymentRequest, $request);
        return redirect()->route($this->redirectRoute . 'index');
    }


    public function destroy(PaymentRequest $paymentRequest)
    {
        $this->paymentRequestService->delete($paymentRequest);
        return redirect()->route($this->redirectRoute . 'index');
    }

    public function confirm(PaymentRequest $paymentRequest)
    {
        $paymentRequest->status = 1;
        $paymentRequest->update();
        return redirect()->route($this->redirectRoute . 'index');
    }
    public function reject(PaymentRequest $paymentRequest)
    {
        $paymentRequest->status = 0;
        $paymentRequest->reject_description;
        $paymentRequest->update();
        event(new RequestReject($paymentRequest));
        return redirect()->route($this->redirectRoute . 'index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\BankRequest;
use App\Models\Bank;
use App\Services\BankService;
use RealRashid\SweetAlert\Facades\Alert;

class BankController extends Controller
{
    protected $redirectRoute = 'bank.';
    protected $viewPath = 'pages.bank.';
    private readonly BankService $bankService;

    public function __construct(BankService $bankService)
    {
        $this->bankService = $bankService;
    }

    public function index()
    {
        $banks = $this->bankService->all();
        return view($this->viewPath . "index", compact('banks'));
    }


    public function create()
    {
        return view($this->viewPath . 'create');
    }


    public function store(BankRequest $request)
    {
        $this->bankService->store($request);
        Alert::success('با موفقیت ایجاد شد');
        return redirect()->route($this->redirectRoute . "index");
    }

    public function show(Bank $bank)
    {
        //
    }


    public function edit(Bank $bank)
    {
        return view($this->viewPath . "edit", compact('bank'));
    }


    public function update(BankRequest $request, Bank $bank)
    {
        $this->bankService->update($bank, $request);
        Alert::success('با موفقیت ویرایش شد');
        return redirect()->route($this->redirectRoute . 'index');
    }


    public function destroy(Bank $bank)
    {
        $this->bankService->delete($bank);
        Alert::success('با موفقیت حذف شد');
        return redirect()->route($this->redirectRoute . 'index');
    }
}

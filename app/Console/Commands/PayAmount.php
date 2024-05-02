<?php

namespace App\Console\Commands;

use App\Services\BankService;
use App\Services\PaymentRequestService;
use Illuminate\Console\Command;

class PayAmount extends Command
{
    private readonly BankService $bankService;
    private readonly PaymentRequestService $paymentRequestService;

    public function __construct(BankService $bankService, PaymentRequestService $paymentRequestService)
    {
        parent::__construct();

        $this->bankService = $bankService;
        $this->paymentRequestService = $paymentRequestService;
    }

    protected $signature = 'app:pay-amount';

    protected $description = 'Automatically pay amount of request';

    public function handle()
    {
        $confirmedPays = $this->paymentRequestService->getConfirmed();
        $banks = $this->bankService->all();
        foreach ($confirmedPays as $confirmedPay) {
            foreach ($banks as $bank) {
                if ($confirmedPay->shaba_identifier == $bank->shaba_identifier)
                {
                    error_log('call api '.$bank->name);
                }
            }
        }
    }
}

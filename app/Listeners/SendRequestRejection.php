<?php

namespace App\Listeners;

use App\Events\RequestReject;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendRequestRejection
{

    public function handle(RequestReject $event): void
    {
        $payment_request = $event->paymentRequest;
        error_log('Call SMS API for send message to '.$payment_request->user->name);
    }
}

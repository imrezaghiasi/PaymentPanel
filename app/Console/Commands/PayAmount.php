<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class PayAmount extends Command
{
    protected $signature = 'app:pay-amount';

    protected $description = 'Automatically pay amount of request';

    public function handle()
    {
        error_log('call bank api');
    }
}

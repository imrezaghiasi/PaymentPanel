<?php

namespace Database\Seeders;

use App\Models\PaymentRequest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentRequest::factory(10)->create();
    }
}

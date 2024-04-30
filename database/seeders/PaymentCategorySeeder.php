<?php

namespace Database\Seeders;

use App\Models\PaymentCategory;
use Illuminate\Database\Seeder;

class PaymentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentCategory::create([
            'name' => 'حمل و نقل',
        ]);
        PaymentCategory::create([
            'name' => 'ایاب و ذهاب',
        ]);
        PaymentCategory::create([
            'name' => 'خرید تجهیزات',
        ]);
    }
}

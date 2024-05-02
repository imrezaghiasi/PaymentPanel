<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bank::factory()->create([
            'name' => 'بانک ملی',
            'shaba_identifier' => '11'
        ]);

        Bank::factory()->create([
            'name' => 'بانک ملت',
            'shaba_identifier' => '12'
        ]);

        Bank::factory()->create([
            'name' => 'بانک سپه',
            'shaba_identifier' => '13'
        ]);
    }
}

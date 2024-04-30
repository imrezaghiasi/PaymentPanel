<?php

namespace Database\Factories;

use App\Models\PaymentCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ybazli\Faker\Facades\Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaymentRequest>
 */
class PaymentRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = PaymentCategory::pluck('id')->toArray();
        $users = User::pluck('id')->toArray();

        return [
            'user_id' => $this->faker->randomElement($users),
            'category_id' => $this->faker->randomElement($categories),
            'request_description' => Faker::paragraph(),
            'reject_description' => Faker::paragraph(),
            'status' => 2,
            'amount' => $this->faker->numberBetween(100000000, 150000000),
            'file_path' => $this->faker->url(),
            'shaba_number' => Faker::mellicode(),
            'national_code' => Faker::mellicode()
        ];
    }
}

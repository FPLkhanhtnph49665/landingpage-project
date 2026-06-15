<?php

namespace Database\Factories;

use App\Models\Donation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DonationFactory extends Factory
{
    protected $model = Donation::class;

    public function definition(): array
    {
        return [
            'uuid' => (string) Str::uuid(),
            'user_id' => null,
            'campaign_id' => null,
            'child_id' => null,
            'amount' => $this->faker->randomFloat(2, 10000, 1000000),
            'currency' => 'VND',
            'status' => 'success',
            'gateway' => 'manual',
            'gateway_ref' => null,
            'paid_at' => now(),
        ];
    }
}

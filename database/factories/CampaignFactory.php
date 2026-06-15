<?php

namespace Database\Factories;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CampaignFactory extends Factory
{
    protected $model = Campaign::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        return [
            'uuid' => (string) Str::uuid(),
            'title' => $title,
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(100,999),
            'description' => $this->faker->paragraph(3),
            'target_amount' => $this->faker->numberBetween(1000000, 500000000),
            'collected_amount' => 0,
            'start_at' => now(),
            'end_at' => now()->addMonths(3),
            'status' => 'draft',
        ];
    }
}

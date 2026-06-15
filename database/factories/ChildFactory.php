<?php

namespace Database\Factories;

use App\Models\Child;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ChildFactory extends Factory
{
    protected $model = Child::class;

    public function definition(): array
    {
        return [
            'uuid' => (string) Str::uuid(),
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(['male','female']),
            'dob' => $this->faker->date(),
            'bio' => $this->faker->sentence(12),
            'photo' => null,
            'status' => 'active',
        ];
    }
}

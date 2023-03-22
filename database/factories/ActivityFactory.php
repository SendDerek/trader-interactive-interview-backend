<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition(): array
    {
        return [
            'activity' => $this->faker->name,
            'type' => $this->faker->randomElement(['recreational']),
            'participants' => $this->faker->randomNumber(),
            'price' => 0.30,
            'link' => $this->faker->url,
            'key' => $this->faker->randomNumber(5),
            'accessibility' => 0.30,
        ];
    }
}

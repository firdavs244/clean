<?php

namespace Database\Factories;

use App\Models\post;
use Illuminate\Database\Eloquent\Factories\Factory;

class postFactory extends Factory
{
    protected $model = post::class;

    public function definition(): array
    {
        return [
            'user_id' => 1,
            'category_id' => rand(1, 5),
            'title' => fake()->sentence(),
            'short_content' => fake()->sentence(15),
            'content' => fake()->paragraph(15)
        ];
    }
}

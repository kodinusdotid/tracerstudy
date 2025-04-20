<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GraduationYearGroup>
 */
class GraduationYearGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->year();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'image' => $this->faker->optional()->imageUrl(),
            'description' => $this->faker->optional()->text(100),
        ];
    }
}


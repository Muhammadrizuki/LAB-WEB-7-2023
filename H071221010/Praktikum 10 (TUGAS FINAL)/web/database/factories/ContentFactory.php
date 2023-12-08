<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true), // Generates a random string with 3 words
            'course_content' => $this->faker->paragraph,
            'course_id' => $this->faker->numberBetween(1,12),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

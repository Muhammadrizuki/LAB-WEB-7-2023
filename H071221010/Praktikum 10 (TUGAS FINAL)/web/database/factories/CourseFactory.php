<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_name' => $this->faker->words(3, true), // Generates a random string with 3 words
            'description' => $this->faker->paragraph,
            'start_at' => $this->faker->date,
            'end_at' => $this->faker->date,
            'user_id' => $this->faker->numberBetween(1,10), // Assuming user_id is an integer
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

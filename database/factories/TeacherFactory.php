<?php
// File: database/factories/TeacherFactory.php

namespace Database\Factories;

use App\Models\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'course_id' => $this->faker->numberBetween(1, 5), // Assuming course IDs range from 1 to 5
            'department' => $this->faker->word, // Generate a random word for department
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
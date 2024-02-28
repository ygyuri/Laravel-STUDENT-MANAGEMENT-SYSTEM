<?php     // File: database/factories/CourseFactory.php

namespace Database\Factories;

use App\Models\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_name' => $this->faker->words(3, true), // Generate a random name consisting of 3 words
            'teacher_id' => $this->faker->numberBetween(1, 10), // Assuming teacher IDs range from 1 to 10
            'department_id' => $this->faker->numberBetween(1, 5), // Assuming department IDs range from 1 to 5
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
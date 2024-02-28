<?php

namespace Database\Factories;

use App\Models\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

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
            'fees' => $this->faker->randomFloat(2, 100, 1000), // Random fees between 100 and 1000
            'password' => bcrypt('password'), // Set a default password
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
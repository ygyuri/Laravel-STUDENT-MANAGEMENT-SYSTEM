<?php

namespace Database\Factories;

use App\Models\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => $this->faker->numberBetween(1, 5), // Assuming course IDs range from 1 to 5
            'teacher_id' => $this->faker->numberBetween(1, 10), // Assuming teacher IDs range from 1 to 10
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
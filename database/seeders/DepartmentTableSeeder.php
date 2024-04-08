<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Models\Department;
class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define department data
        $departments = [
            ['Department_Name' => 'Pure and Applied Mathematics'],
            ['Department_Name' => 'Biology and Bio Sciences'],
            ['Department_Name' => 'Human Resource and Management'],
            ['Department_Name' => 'Business and Economics'],
            ['Department_Name' => 'IT and Technology'],
        ];

        // Insert data into the departments table
        foreach ($departments as $departmentData) {
            // Create a new department instance and insert into the database
            Department::create($departmentData);
        }
    }
}

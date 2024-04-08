<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call DepartmentTableSeeder to seed departments table
        $this->call(DepartmentTableSeeder::class);

        // Call StudentTableSeeder to seed students table
        $this->call(StudentTableSeeder::class);

        // Call AdminSeeder to seed admins table
        $this->call(AdminSeeder::class);

        // Call CourseTableSeeder to seed courses table
        $this->call(CourseTableSeeder::class);

        // Call TeacherTableSeeder to seed teachers table
        $this->call(TeacherTableSeeder::class);

        // Add more seeders here as needed

        // Call CourseTeacherSeeder to seed pivot table
        $this->call(CourseTeacherSeeder::class);
    }
}
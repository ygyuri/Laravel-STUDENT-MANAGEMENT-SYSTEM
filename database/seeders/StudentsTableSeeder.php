<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Models\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create specific student records
        Student::create([
            'name' => 'Peter Masalsi',
            'email' => 'petermasalsi@gmail.com',
            'course_id' => 1,
            'fees' => 18977,
            'password' => Hash::make('password1'), // Hash the password using Hash::make() method
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
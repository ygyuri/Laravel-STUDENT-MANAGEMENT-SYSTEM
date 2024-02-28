<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create and save three teachers
        Teacher::create([
            'name' => 'Stauffer Kudunda',
            'email' => 'staufferkudunda@gmail.com',
            'course_id' => 1,
            'department' => 'Pure and Applied Mathematics',
            'password' => Hash::make('password7'),
        ]);

        Teacher::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'course_id' => 2,
            'department' => 'Chemistry',
            'password' => Hash::make('password8'),
        ]);

        Teacher::create([
            'name' => 'Alice Johnson',
            'email' => 'alice@example.com',
            'course_id' => 3,
            'department' => 'Biology',
            'password' => Hash::make('password9'),
        ]);
    }
}
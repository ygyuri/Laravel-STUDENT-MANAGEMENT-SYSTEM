<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Models\Course;
use App\Models\Models\Department;
use App\Models\Models\Teacher; // Import Teacher model

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve departments
        $mathematicsDepartment = Department::where('Department_Name', 'Pure and Applied Mathematics')->first();
        $biologyDepartment = Department::where('Department_Name', 'Biology and Bio Sciences')->first();
        $hrmDepartment = Department::where('Department_Name', 'Human Resource and Management')->first();
        $businessDepartment = Department::where('Department_Name', 'Business and Economics')->first();
        $itDepartment = Department::where('Department_Name', 'IT and Technology')->first();

        // Seed courses
        Course::create([
            'course_name' => 'Mathematics and Computer Science',
            'department_id' => $mathematicsDepartment->id,
            'teacher_id' => Teacher::where('name', 'Enos Odera')->first()->id,
        ]);

        Course::create([
            'course_name' => 'BioStatistics and Informatics',
            'department_id' => $biologyDepartment->id,
            'teacher_id' => Teacher::where('name', 'Frankline Robert')->first()->id,
        ]);

        Course::create([
            'course_name' => 'Journalism and Mass Media',
            'department_id' => $hrmDepartment->id,
            'teacher_id' => Teacher::where('name', 'Sylvia Saint')->first()->id,
        ]);

        Course::create([
            'course_name' => 'Accounting and Finance',
            'department_id' => $businessDepartment->id,
            'teacher_id' => Teacher::where('name', 'Purity Sirona')->first()->id,
        ]);

        Course::create([
            'course_name' => 'Quantum Physics',
            'department_id' => $itDepartment->id,
            'teacher_id' => Teacher::where('name', 'Wycliff Opanyazi')->first()->id,
        ]);
    }
}
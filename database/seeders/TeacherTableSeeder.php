<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Models\Course;
use App\Models\Models\Department;
use App\Models\Models\Teacher; // Import Teacher model
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
        // Retrieve departments
        $mathematicsDepartment = Department::where('Department_Name', 'Pure and Applied Mathematics')->first();
        $biologyDepartment = Department::where('Department_Name', 'Biology and Bio Sciences')->first();
        $hrmDepartment = Department::where('Department_Name', 'Human Resource and Management')->first();
        $businessDepartment = Department::where('Department_Name', 'Business and Economics')->first();
        $itDepartment = Department::where('Department_Name', 'IT and Technology')->first();

        // Seed teachers
        $this->seedTeacherWithCourses('Enos Odera', $mathematicsDepartment, 'Mathematics and Computer Science');
        $this->seedTeacherWithCourses('Frankline Robert', $biologyDepartment, 'BioStatistics and Informatics');
        $this->seedTeacherWithCourses('Sylvia Saint', $hrmDepartment, 'Journalism and Mass Media');
        $this->seedTeacherWithCourses('Purity Sirona', $businessDepartment, 'Accounting and Finance');
        $this->seedTeacherWithCourses('Wycliff Opanyazi', $itDepartment, 'Quantum Physics');
    }

    /**
     * Seed a teacher record with associated courses.
     *
     * @param string $teacherName
     * @param \App\Models\Models\Department $department
     * @param string $courseName
     * @return void
     */
    private function seedTeacherWithCourses($teacherName, $department, $courseName)
    {
        // Find or create the teacher and associate with the department
        $teacher = Teacher::updateOrCreate(
            ['name' => $teacherName],
            [
                'email' => strtolower(str_replace(' ', '.', $teacherName)).'@example.com',
                'password' => Hash::make('password'),
                'department_id' => $department->id // Associate teacher with the department
            ]
        );

        // Find or create the course associated with the department
        $course = Course::updateOrCreate(
            ['course_name' => $courseName],
            ['department_id' => $department->id, 'teacher_id' => $teacher->id] // Associate course with teacher
        );
    }
}
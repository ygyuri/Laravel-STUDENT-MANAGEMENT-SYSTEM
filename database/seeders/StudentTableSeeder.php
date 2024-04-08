<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Models\Student;
use Illuminate\Support\Facades\Hash;
use App\Models\Models\Department;
use App\Models\Models\Course;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed the students table with sample data
        $this->seedStudent('Yuri Juma', 'yuri.juma@students.jkuat.ac.ke', 'password1', 3000, 'Pure and Applied Mathematics', 'Mathematics and Computer Science');
        $this->seedStudent('Peter Keneth', 'ygphotographyke@gmail.com', 'password2', 2000, 'Biology and Bio Sciences', 'BioStatistics and Informatics');
        $this->seedStudent('Georgia Keen', 'gideonyuri15@gmail.com', 'password3', 1000, 'Human Resource and Management', 'Journalism and Mass Media');
        $this->seedStudent('Everlyn Bush', 'williammwendwa@gmail.com', 'password4', 4000, 'Business and Economics', 'Accounting and Finance');
        $this->seedStudent('Amy Jane', 'faaithkamunyaa@gmailcom', 'password5', 6000, 'IT and Technology', 'Quantum Physics');
    }

    /**
     * Seed a student record.
     *
     * @param string $name
     * @param string $email
     * @param string $password
     * @param int $feeBalance
     * @param string $departmentName
     * @param string $courseName
     * @return void
     */
    private function seedStudent($name, $email, $password, $feeBalance, $departmentName, $courseName)
     {
    // Find or create the department
    $department = Department::updateOrCreate(
        ['Department_Name' => $departmentName]
    );

    // Find or create the course associated with the department
    $course = Course::updateOrCreate(
        ['course_name' => $courseName],
        ['department_id' => $department->id]
    );

    // Retrieve the teacher for the course
    $teacher = $course->teacher; // This assumes you have a relationship set up between Course and Teacher models

    if (!$teacher) {
        // If the course doesn't have a teacher, you may need to handle this case accordingly
        // For example, you can throw an exception or log a warning
        throw new \Exception("No teacher found for the course: $courseName");
    }

    // Create and save the new student record
    Student::create([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password),
        'fee_balance' => $feeBalance,
        'course_id' => $course->id,
        'teacher_id' => $teacher->id, // Associate student with teacher
    ]);
}

}

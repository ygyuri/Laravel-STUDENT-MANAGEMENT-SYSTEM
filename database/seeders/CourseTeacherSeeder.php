<?php

// CourseTeacherSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Models\Teacher;
use App\Models\Models\Course;

class CourseTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve teachers with their associated courses
        $teachers = Teacher::with('courses')->get();

        // Loop through each teacher
        foreach ($teachers as $teacher) {
            // Loop through each course associated with the teacher
            foreach ($teacher->courses as $course) {
                // Attach the teacher to the course
                $course->teachers()->attach($teacher->id, ['unit' => 3]); // Adjust the unit value as needed
            }
        }
    }
}
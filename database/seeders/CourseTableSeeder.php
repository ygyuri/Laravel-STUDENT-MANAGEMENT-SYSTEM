<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Models\Course;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory(5)->create();
    }
}

<?php

// File: database/seeders/DepartmentTableSeeder.php

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
        Department::factory(5)->create();
    }
}
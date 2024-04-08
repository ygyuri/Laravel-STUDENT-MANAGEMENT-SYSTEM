<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define data for admins
        $admins = [
            [
                'name' => 'Admin1',
                'email' => 'admin1@example.com',
                'password' => Hash::make('password1'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@example.com',
                'password' => Hash::make('password2'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin3',
                'email' => 'admin3@example.com',
                'password' => Hash::make('password3'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert data into admins table
        DB::table('admins')->insert($admins);
    }
}
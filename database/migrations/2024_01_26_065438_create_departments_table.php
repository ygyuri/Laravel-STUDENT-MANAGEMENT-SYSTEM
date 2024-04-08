<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the 'departments' table
        Schema::create('departments', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('Department_Name'); // Name of the department
            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the 'departments' table if it exists
        Schema::dropIfExists('departments');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('name'); // Name of the student
            $table->string('email')->unique(); // Unique email address of the student
            $table->foreignId('course_id')->constrained()->onDelete('cascade'); // Foreign key referencing the 'id' column in the 'courses' table
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade'); // Foreign key referencing the 'id' column in the 'teachers' table
            $table->string('password'); // Password of the student
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
        Schema::dropIfExists('students');
    }
}
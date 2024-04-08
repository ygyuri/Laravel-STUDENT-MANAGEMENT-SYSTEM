<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name'); // Name of the course
            $table->unsignedBigInteger('teacher_id'); // Foreign key referencing the 'id' column in the 'teachers' table
            $table->unsignedBigInteger('department_id'); // Foreign key referencing the 'id' column in the 'departments' table
            $table->timestamps(); // Created at and Updated at timestamps

            // Define foreign key constraints
           // $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            // This ensures that if a referenced record in the 'teachers' table is deleted,
            // the related records in the 'courses' table will also be deleted (cascade delete).

           // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // This ensures that if a referenced record in the 'departments' table is deleted,
            // the related records in the 'courses' table will also be deleted (cascade delete).
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
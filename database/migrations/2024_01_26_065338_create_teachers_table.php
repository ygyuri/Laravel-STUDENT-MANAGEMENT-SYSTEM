<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTeachersTable
 *
 * This migration creates the 'teachers' table, which stores information about teachers.
 */
class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the teacher
            $table->string('password');
            $table->string('email')->unique(); // Unique email address of the teacher
            $table->unsignedBigInteger('course_id'); // Foreign key referencing the 'id' column in the 'courses' table
            $table->string('department'); // Department to which the teacher belongs
            $table->timestamps(); // Created at and Updated at timestamps

            /*// Foreign key constraint for course_id
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            // This ensures that if a referenced record in the 'courses' table is deleted,*/
            // the related records in the 'teachers' table will also be deleted (cascade delete).

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}

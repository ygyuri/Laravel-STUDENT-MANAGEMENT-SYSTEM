<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateDepartmentsTable
 *
 * This migration creates the 'departments' table, which stores information about departments.
 */
class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->unsignedBigInteger('course_id'); // Foreign key referencing the 'id' column in the 'courses' table
            $table->unsignedBigInteger('teacher_id'); // Foreign key referencing the 'id' column in the 'teachers' table
            $table->timestamps(); // Created at and Updated at timestamps

            /*// Foreign key constraint for course_id
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            // This ensures that if a referenced record in the 'courses' table is deleted,
            // the related records in the 'departments' table will also be deleted (cascade delete).*/

            /*// Foreign key constraint for teacher_id
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            // This ensures that if a referenced record in the 'teachers' table is deleted,*/
            // the related records in the 'departments' table will also be deleted (cascade delete).
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}

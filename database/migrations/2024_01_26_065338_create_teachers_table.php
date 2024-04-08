<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the 'teachers' table
        Schema::create('teachers', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('name'); // Name of the teacher
            $table->string('email')->unique(); // Unique email address of the teacher
            $table->string('password'); // Password field
            $table->unsignedBigInteger('department_id'); // Foreign key referencing the 'id' column in the 'departments' table
            $table->timestamps(); // Created at and Updated at timestamps

            // Foreign key constraint for department_id
          //  $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // This ensures that if a referenced record in the 'departments' table is deleted,
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
        // Drop the 'teachers' table if it exists
        Schema::dropIfExists('teachers');
    }
}

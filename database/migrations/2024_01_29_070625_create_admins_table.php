<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the admin
            $table->string('password'); // Password of the admin
            $table->string('email')->unique(); // Unique email address of the admin



            // Foreign key constraint for department_id
           // $table->unsignedBigInteger('department_id'); // Foreign key referencing the 'id' column in the 'departments' table
          //  $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // This ensures that if a referenced record in the 'departments' table is deleted,
            // the related records in the 'admins' table will also be deleted (cascade delete).

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
        Schema::dropIfExists('admins');
    }
}
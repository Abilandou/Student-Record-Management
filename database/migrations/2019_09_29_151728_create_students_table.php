<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name')->nullable();
            $table->string('full_name');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('sex');
            $table->string('student_phone')->nullable();
            $table->string('parent_phone');
            $table->string('student_email')->nullable();
            $table->string('student_address');
            $table->string('parent_address');
            $table->string('school_last_attended')->nullable();
            $table->string('student_image')->nullable();
            $table->integer('class_id');

            $table->foreign('class_id')->references('id')->on('student_classes')->onDelete('cascade');
            $table->timestamps();
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

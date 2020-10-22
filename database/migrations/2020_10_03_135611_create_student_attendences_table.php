<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttendencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attendences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_id')->comment('student_id=user_id');
            $table->integer('year_id');
            $table->integer('class_id');
            $table->integer('section_id')->nullable();
            $table->integer('subject_id')->nullable();
            $table->string('added_by')->nullable();

            $table->date('date');
            $table->string('attend_status');
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
        Schema::dropIfExists('student_attendences');
    }
}

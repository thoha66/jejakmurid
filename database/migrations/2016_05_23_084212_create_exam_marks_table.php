<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('class_subject_exam_id')->unsigned(); //FK
            $table->integer('student_id')->unsigned(); //FK
            $table->integer('subject_id')->unsigned(); //FK
            $table->decimal('markah_peperiksaan')->nullable();
            $table->timestamps();

            $table->foreign('class_subject_exam_id')
                ->references('id')
                ->on('class_subject_exams')
                ->onDelete('cascade');

            $table->foreign('student_id')
                ->references('id')
                ->on('students');

            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('exam_marks');
    }
}

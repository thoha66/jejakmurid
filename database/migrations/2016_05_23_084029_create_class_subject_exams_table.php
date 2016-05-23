<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassSubjectExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_subject_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id')->unsigned(); //FK
            $table->integer('teacher_id')->unsigned(); //FK
            $table->integer('classroom_subject_id')->unsigned(); //FK
            $table->string('sesi_peperiksaan')->nullable();
            $table->timestamps();

            $table->foreign('exam_id')
                ->references('id')
                ->on('exams');

            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers');

            $table->foreign('classroom_subject_id')
                ->references('id')
                ->on('classroom_subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('class_subject_exams');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentOffensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_offenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned(); //Fk
            $table->integer('student_id')->unsigned(); //Fk
            $table->integer('offense_id')->unsigned(); //Fk
            $table->date('tarikh_kesalahan')->nullable();
            $table->time('masa_kesalahan')->nullable();
            $table->string('tempat_kesalahan')->nullable();
            $table->timestamps();

            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers');

            $table->foreign('student_id')
                ->references('id')
                ->on('students');

            $table->foreign('offense_id')
                ->references('id')
                ->on('offenses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_offenses');
    }
}

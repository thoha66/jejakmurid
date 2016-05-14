<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned(); //FK
            $table->integer('task_id')->unsigned(); //FK
            $table->integer('student_id')->unsigned(); //FK
            $table->decimal('mark')->nullable(); //FK
            $table->timestamps();

            //Foreign Key Constraints
            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers');

            $table->foreign('task_id')
                ->references('id')
                ->on('tasks');

            $table->foreign('student_id')
                ->references('id')
                ->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('task_marks');
    }
}

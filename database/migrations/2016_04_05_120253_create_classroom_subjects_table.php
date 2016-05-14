<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned(); //FK
            $table->integer('classroom_id')->unsigned(); //FK
            $table->integer('subject_id')->unsigned(); //FK
            $table->integer('teacher_id')->unsigned(); //FK
            $table->string('sesi')->nullable();
            $table->timestamps();

            $table->foreign('admin_id')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');

            $table->foreign('classroom_id')
                  ->references('id')
                  ->on('classrooms');

            $table->foreign('subject_id')
                  ->references('id')
                  ->on('subjects');

            $table->foreign('teacher_id')
                  ->references('id')
                  ->on('teachers')
                  ->onDelete('cascade');
            


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classroom_subjects');
    }
}

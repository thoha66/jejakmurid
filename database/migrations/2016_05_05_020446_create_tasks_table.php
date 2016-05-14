<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned(); //FK
            $table->integer('classroom_subject_id')->unsigned(); //FK
            $table->string('tajuk_tugasan')->nullable();
            $table->string('penerangan_tugasan')->nullable();
            $table->date('tarikh_beri')->nullable();
            $table->date('tarikh_hantar')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            //Foreign Key Constraints
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
        Schema::drop('tasks');
    }
}

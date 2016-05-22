<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned(); //Fk
            $table->integer('classroom_id')->unsigned(); //Fk
            $table->date('tarikh')->nullable();
            $table->timestamps();

            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers');

            $table->foreign('classroom_id')
                ->references('id')
                ->on('classrooms');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attendances');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id')->unsigned();//FK
            $table->string('kod_kelas')->nullable();
            $table->string('nama_kelas')->nullable();
            $table->string('tingkatan')->nullable();
            $table->timestamps();

            $table->foreign('admin_id')
                  ->references('id')
                  ->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('classrooms');
    }
}

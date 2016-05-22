<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kesalahan')->nullable();
            $table->string('nota_kesalahan')->nullable();
            $table->integer('bilangan_mata_kesalahan')->unsigned(); //Fk
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
        Schema::drop('offenses');
    }
}

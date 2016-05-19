<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaretakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caretakers', function (Blueprint $table) {
            //Maklumat Penjaga
            $table->increments('id');
            $table->integer('user_id')->unsigned(); //FK
            $table->string('no_kp_penjaga')->nullable()->unique();
            $table->string('nama_penjaga')->nullable();
            $table->string('alamat_penjaga')->nullable();
            $table->string('poskod_penjaga')->nullable();
            $table->string('no_tel_penjaga')->nullable();
            $table->string('email_penjaga')->nullable()->unique();
            //Maklumat Bapa
            $table->string('no_kp_bapa')->nullable();
            $table->string('nama_bapa')->nullable();
            $table->string('alamat_bapa')->nullable();
            $table->string('poskod_bapa')->nullable();
            $table->string('no_tel_bapa')->nullable();
            $table->string('email_bapa')->nullable();
            //Maklumat Ibu
            $table->string('no_kp_ibu')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('alamat_ibu')->nullable();
            $table->string('poskod_ibu')->nullable();
            $table->string('no_tel_ibu')->nullable();
            $table->string('email_ibu')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('caretakers');
    }
}

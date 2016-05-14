<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); //FK
            $table->string('no_kp_admin')->nullable()->unique();
            $table->string('nama_admin')->nullable();
            $table->string('no_tel_admin')->nullable();
            $table->string('no_hp_admin')->nullable();
            $table->date('tarikh_lahir_admin')->nullable();
            $table->string('alamat_admin')->nullable();
            $table->string('poskod_admin')->nullable();
            $table->string('email_admin')->nullable()->unique();
            $table->string('jantina_admin')->nullable();
            $table->timestamps();

            //Foreign Key Constraints
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
        Schema::drop('admins');
    }
}

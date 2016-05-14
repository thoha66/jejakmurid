<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); //FK
            $table->integer('admin_id')->unsigned(); //FK
            $table->integer('guru_kelas_id')->unsigned(); // (FK) Menjadi guru kelas di mana ?
            $table->string('no_kp_guru')->nullable()->unique();
            $table->string('jenis_guru')->nullable(); //Tak boleh edit oleh guru. Hanya pentadbir yg boleh edit
            $table->string('nama_guru')->nullable();
            $table->string('no_tel_guru')->nullable();
            $table->string('no_hp_guru')->nullable();
            $table->date('tarikh_lahir_guru')->nullable();
            $table->string('alamat_guru')->nullable();
            $table->string('poskod_guru')->nullable();
            $table->string('email_guru')->nullable()->unique();
            $table->string('umur_guru')->nullable();
            $table->string('jantina_guru')->nullable();
            $table->timestamps();

            //Foreign Key Constraints
            $table->foreign('admin_id')
                ->references('id')
                ->on('admins');

            $table->foreign('guru_kelas_id')
                ->references('id')
                ->on('classrooms');

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
        Schema::drop('teachers');
    }
}

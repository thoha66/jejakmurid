<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); //FK
            $table->integer('admin_id')->unsigned(); //Fk
            $table->integer('parent_id')->unsigned(); //Fk
            $table->integer('classroom_id')->unsigned(); //Fk
            $table->string('no_surat_beranak_pelajar')->nullable()->unique();
            $table->string('no_kp_pelajar')->nullable()->unique();
            $table->string('nama_pelajar')->nullable(); //Tak boleh edit oleh guru. Hanya pentadbir yg boleh edit
            $table->string('tingkatan_pelajar')->nullable(); //Menjadi guru kelas di mana ?
            $table->string('no_kp_penjaga_pelajar')->nullable();
            // $table->string('nama_penjaga')->nullable();
            // $table->string('alamat_penjaga')->nullable();
            // $table->string('poskod_penjaga')->nullable();
            $table->date('tarikh_lahir_pelajar')->nullable();
            $table->string('alamat_pelajar')->nullable();
            $table->string('poskod_pelajar')->nullable();
            $table->string('email_pelajar')->nullable()->unique();
            $table->string('umur_pelajar')->nullable();
            $table->string('jantina_pelajar')->nullable();
            $table->timestamps();

            $table->foreign('admin_id')
                  ->references('id')
                  ->on('admins');

            $table->foreign('parent_id')
                  ->references('id')
                  ->on('parents');

            $table->foreign('classroom_id')
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
        Schema::drop('students');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('admin_id')->unsigned();//Fk
          $table->string('tajuk')->nullable();
          $table->date('tarikh_mula')->nullable();
          $table->date('tarikh_akhir')->nullable();
          $table->time('masa_mula')->nullable();
          $table->time('masa_akhir')->nullable();
          $table->string('tempat')->nullable();
          $table->longText('penerangan_aktiviti')->nullable();
          $table->timestamps();

          //Foreign Key Constraints
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
        Schema::drop('news');
    }
}

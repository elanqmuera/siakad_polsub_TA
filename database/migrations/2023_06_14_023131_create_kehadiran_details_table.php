<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKehadiranDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadiran_details', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('id_kehadiran')->nullable();
            $table->integer('id_mahasiswa')->nullable();
            $table->string('status');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kehadiran_details');
    }
}

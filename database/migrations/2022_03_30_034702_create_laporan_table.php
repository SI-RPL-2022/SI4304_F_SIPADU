<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->string('no_referensi')->nullable();
            $table->string('fasilitas')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('file')->nullable();
            $table->integer('tipe')->nullable();
            $table->integer('status')->nullable();
            $table->text('alasan_penolakan')->nullable();
            $table->timestamps();


            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
}

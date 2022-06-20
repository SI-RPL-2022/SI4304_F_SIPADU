<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignPetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_petugas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_laporan');
            $table->text('description')->nullable();
            $table->text('metode')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();


            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_laporan')->references('id')->on('laporan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_petugas');
    }
}

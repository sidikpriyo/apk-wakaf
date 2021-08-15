<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donatur_id');
            $table->unsignedBigInteger('kategori_id');
            $table->integer('lihat')->default('0');
            $table->integer('donasi')->default('0');
            $table->timestamps();

            $table->foreign('donatur_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('kategori_id')->on('kategori')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat');
    }
}

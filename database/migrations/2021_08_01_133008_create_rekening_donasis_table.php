<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekeningDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekening_donasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donasi_id');
            $table->unsignedBigInteger('rekening_id');
            $table->timestamps();

            $table->foreign('donasi_id')->on('donasi')->references('id')->onDelete('cascade');
            $table->foreign('rekening_id')->on('rekening')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekening_donasi');
    }
}

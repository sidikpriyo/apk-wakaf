<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasiTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasi_transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('donasi_id');
            $table->json('response');
            $table->timestamps();

            $table->foreign('donasi_id')->on('donasi')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donasi_transaksi');
    }
}

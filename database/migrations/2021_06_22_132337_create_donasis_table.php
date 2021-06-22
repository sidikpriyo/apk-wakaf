<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasi', function (Blueprint $table) {
            $table->id();
            $table->integer('nominal');
            $table->text('catatan');
            $table->unsignedBigInteger('donatur_id');
            $table->unsignedBigInteger('kampanye_id');
            $table->unsignedBigInteger('pembayaran_id')->nullable();
            $table->unsignedBigInteger('status_pembayaran_id')->default('1');
            $table->timestamps();

            $table->foreign('donatur_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kampanye_id')->references('id')->on('kampanye')->onDelete('cascade');
            $table->foreign('pembayaran_id')->references('id')->on('pembayaran')->onDelete('cascade');
            $table->foreign('status_pembayaran_id')->references('id')->on('status_pembayaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donasi');
    }
}

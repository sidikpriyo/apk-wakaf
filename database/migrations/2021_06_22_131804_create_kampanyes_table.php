<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKampanyesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kampanye', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('gambar', 100);
            $table->text('keterangan');
            $table->text('deskripsi');
            $table->bigInteger('kebutuhan');
            $table->bigInteger('terkumpul')->default('0');
            $table->timestamp('tanggal_berakhir')->nullable();
            $table->unsignedBigInteger('lembaga_id');
            $table->unsignedBigInteger('kategori_id');
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
            $table->foreign('lembaga_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kampanye');
    }
}

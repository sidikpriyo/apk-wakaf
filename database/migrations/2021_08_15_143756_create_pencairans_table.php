<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencairansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencairan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kampanye_id');
            $table->bigInteger('nominal')->default('0');
            $table->string('keterangan', 150)->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->foreign('kampanye_id')->on('kampanye')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pencairan');
    }
}

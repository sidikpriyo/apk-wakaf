<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKampanyeId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('riwayat', function (Blueprint $table) {
            $table->unsignedBigInteger('kampanye_id')->nullable();

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
        Schema::table('riwayat', function (Blueprint $table) {
            $table->dropColumn('kampanye_id');
        });
    }
}

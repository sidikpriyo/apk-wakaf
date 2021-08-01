<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahRekeningBankLembaga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lembaga', function (Blueprint $table) {
            $table->string('rekening', 50)->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();

            $table->foreign('bank_id')->references('id')->on('bank')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lembaga', function (Blueprint $table) {
            $table->dropColumn('rekening');
            $table->dropColumn('bank_id');
        });
    }
}

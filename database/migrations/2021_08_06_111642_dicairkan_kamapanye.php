<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DicairkanKamapanye extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kampanye', function (Blueprint $table) {
            $table->integer('dicairkan')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kampanye', function (Blueprint $table) {
            $table->dropColumn('dicairkan');
        });
    }
}

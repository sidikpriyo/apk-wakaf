<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTabelKampanye extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kampanye', function (Blueprint $table) {
            $table->timestamp('tanggal_publikasi')->nullable();
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
            $table->dropColumn('tanggal_publikasi');
        });
    }
}

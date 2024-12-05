<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            $table->integer('jumlah_laki_usia')->default(0);
            $table->integer('jumlah_perempuan_usia')->default(0);
            $table->integer('jumlah_penduduk_usia')->default(0);
        });
    }

    public function down()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            $table->dropColumn([
                'jumlah_laki_usia',
                'jumlah_perempuan_usia',
                'jumlah_penduduk_usia'
            ]);
        });
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            // Tabel N - Data SMA/MA/SMK
            $table->json('data_sma')->nullable()->after('data_smp');
            
            // Tabel O - Data Perguruan Tinggi
            $table->json('data_pt')->nullable()->after('data_sma');
            
            // Tabel P - Data Pendidikan Khusus
            $table->json('data_pendidikan_khusus')->nullable()->after('data_pt');
            
            // Tabel Q - Data Pendidikan Non Formal
            $table->json('data_pendidikan_non_formal')->nullable()->after('data_pendidikan_khusus');
        });
    }

    public function down()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            $table->dropColumn([
                'data_sma',
                'data_pt',
                'data_pendidikan_khusus',
                'data_pendidikan_non_formal'
            ]);
        });
    }
};
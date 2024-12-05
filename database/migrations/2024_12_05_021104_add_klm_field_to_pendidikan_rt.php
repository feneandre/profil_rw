<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            // K. Jumlah TK
            $table->json('data_tk')->nullable()->comment('Data TK dalam format JSON dengan struktur: nama, alamat, jumlah_siswa, jumlah_guru');
            
            // L. Jumlah SD
            $table->json('data_sd')->nullable()->comment('Data SD dalam format JSON dengan struktur: nama, alamat, jumlah_siswa, jumlah_guru');
            
            // M. Jumlah SMP/MTS
            $table->json('data_smp')->nullable()->comment('Data SMP/MTS dalam format JSON dengan struktur: nama, alamat, jumlah_siswa, jumlah_guru');
        });
    }

    public function down()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            $table->dropColumn([
                'data_tk',
                'data_sd',
                'data_smp'
            ]);
        });
    }
};
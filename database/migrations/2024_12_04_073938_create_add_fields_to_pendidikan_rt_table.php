<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            // Cacat Fisik
            $table->integer('tuna_rungu_l')->default(0);
            $table->integer('tuna_rungu_p')->default(0);
            $table->integer('tuna_wicara_l')->default(0);
            $table->integer('tuna_wicara_p')->default(0);
            $table->integer('tuna_netra_l')->default(0);
            $table->integer('tuna_netra_p')->default(0);
            $table->integer('lumpuh_l')->default(0);
            $table->integer('lumpuh_p')->default(0);
            $table->integer('sumbing_l')->default(0);
            $table->integer('sumbing_p')->default(0);

            // Cacat Mental
            $table->integer('idiot_l')->default(0);
            $table->integer('idiot_p')->default(0);
            $table->integer('gila_l')->default(0);
            $table->integer('gila_p')->default(0);
            $table->integer('stress_l')->default(0);
            $table->integer('stress_p')->default(0);
            $table->integer('autis_l')->default(0);
            $table->integer('autis_p')->default(0);

            // Tenaga Kerja (sesuai gambar)
            $table->integer('penduduk_usia_18_56')->default(0);
            $table->integer('penduduk_usia_18_58_bekerja')->default(0);
            $table->integer('penduduk_usia_18_58_tidak_bekerja')->default(0);
            $table->integer('penduduk_usia_58_keatas')->default(0);
            $table->integer('penduduk_usia_58_keatas_bekerja')->default(0);
            $table->integer('penduduk_usia_58_keatas_tidak_bekerja')->default(0);

            // PAUD
            $table->string('nama_paud')->nullable();
            $table->string('alamat_paud')->nullable();
            $table->integer('jumlah_pengajar_paud')->default(0);
            $table->integer('jumlah_siswa_paud')->default(0);
        });
    }

    public function down()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            // Hapus kolom cacat fisik
            $table->dropColumn([
                'tuna_rungu_l', 'tuna_rungu_p',
                'tuna_wicara_l', 'tuna_wicara_p',
                'tuna_netra_l', 'tuna_netra_p',
                'lumpuh_l', 'lumpuh_p',
                'sumbing_l', 'sumbing_p'
            ]);

            // Hapus kolom cacat mental
            $table->dropColumn([
                'idiot_l', 'idiot_p',
                'gila_l', 'gila_p', 
                'stress_l', 'stress_p',
                'autis_l', 'autis_p'
            ]);

            // Hapus kolom tenaga kerja
            $table->dropColumn([
                'penduduk_usia_18_56',
                'penduduk_usia_18_58_bekerja',
                'penduduk_usia_18_58_tidak_bekerja',
                'penduduk_usia_58_keatas',
                'penduduk_usia_58_keatas_bekerja',
                'penduduk_usia_58_keatas_tidak_bekerja'
            ]);

            // Hapus kolom PAUD
            $table->dropColumn([
                'nama_paud',
                'alamat_paud', 
                'jumlah_pengajar_paud',
                'jumlah_siswa_paud'
            ]);
        });
    }
};
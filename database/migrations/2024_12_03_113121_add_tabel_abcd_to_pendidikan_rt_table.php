<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTabelAbcdToPendidikanRtTable extends Migration
{
    public function up()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            // A. Kondisi Geografis
            $table->string('batas_utara')->nullable();
            $table->string('batas_selatan')->nullable();
            $table->string('batas_timur')->nullable();
            $table->string('batas_barat')->nullable();
            $table->decimal('luas_wilayah', 8, 2)->nullable();
            $table->decimal('sarana_pendidikan', 5, 2)->nullable();
            $table->decimal('sarana_olahraga', 5, 2)->nullable();
            $table->decimal('sarana_pariwisata', 5, 2)->nullable();
            $table->decimal('tanah_lapang', 5, 2)->nullable();

            // B & C. Kondisi Demografi & Potensi SDM
            $table->integer('jumlah_penduduk')->nullable();
            $table->integer('jumlah_laki')->nullable();
            $table->integer('jumlah_perempuan')->nullable();
            $table->integer('jumlah_kk')->nullable();
            $table->integer('jumlah_total')->nullable();
            $table->decimal('kepadatan_penduduk', 8, 2)->nullable();

            // D. Data Usia
            $table->integer('usia_0_4_l')->nullable();
            $table->integer('usia_0_4_p')->nullable();
            $table->integer('usia_5_9_l')->nullable();
            $table->integer('usia_5_9_p')->nullable();
            $table->integer('usia_10_14_l')->nullable();
            $table->integer('usia_10_14_p')->nullable();
            $table->integer('usia_15_19_l')->nullable();
            $table->integer('usia_15_19_p')->nullable();
            $table->integer('usia_20_24_l')->nullable();
            $table->integer('usia_20_24_p')->nullable();
            $table->integer('usia_25_29_l')->nullable();
            $table->integer('usia_25_29_p')->nullable();
            $table->integer('usia_30_34_l')->nullable();
            $table->integer('usia_30_34_p')->nullable();
            $table->integer('usia_35_39_l')->nullable();
            $table->integer('usia_35_39_p')->nullable();
            $table->integer('usia_40_44_l')->nullable();
            $table->integer('usia_40_44_p')->nullable();
            $table->integer('usia_45_49_l')->nullable();
            $table->integer('usia_45_49_p')->nullable();
            $table->integer('usia_50_54_l')->nullable();
            $table->integer('usia_50_54_p')->nullable();
            $table->integer('usia_55_59_l')->nullable();
            $table->integer('usia_55_59_p')->nullable();
            $table->integer('usia_60_64_l')->nullable();
            $table->integer('usia_60_64_p')->nullable();
            $table->integer('usia_65_69_l')->nullable();
            $table->integer('usia_65_69_p')->nullable();
            $table->integer('usia_70_74_l')->nullable();
            $table->integer('usia_70_74_p')->nullable();
            $table->integer('usia_75_plus_l')->nullable();
            $table->integer('usia_75_plus_p')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            $table->dropColumn([
                'batas_utara', 'batas_selatan', 'batas_timur', 'batas_barat',
                'luas_wilayah', 'sarana_pendidikan', 'sarana_olahraga', 'sarana_pariwisata', 'tanah_lapang',
                'jumlah_penduduk', 'jumlah_laki', 'jumlah_perempuan', 'jumlah_kk', 'jumlah_total', 'kepadatan_penduduk',
                'usia_0_4_l', 'usia_0_4_p', 'usia_5_9_l', 'usia_5_9_p', 'usia_10_14_l', 'usia_10_14_p',
                'usia_15_19_l', 'usia_15_19_p', 'usia_20_24_l', 'usia_20_24_p', 'usia_25_29_l', 'usia_25_29_p',
                'usia_30_34_l', 'usia_30_34_p', 'usia_35_39_l', 'usia_35_39_p', 'usia_40_44_l', 'usia_40_44_p',
                'usia_45_49_l', 'usia_45_49_p', 'usia_50_54_l', 'usia_50_54_p', 'usia_55_59_l', 'usia_55_59_p',
                'usia_60_64_l', 'usia_60_64_p', 'usia_65_69_l', 'usia_65_69_p', 'usia_70_74_l', 'usia_70_74_p',
                'usia_75_plus_l', 'usia_75_plus_p'
            ]);
        });
    }
}

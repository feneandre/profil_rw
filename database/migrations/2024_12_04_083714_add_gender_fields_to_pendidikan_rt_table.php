<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            $table->integer('penduduk_usia_18_56_l')->default(0);
            $table->integer('penduduk_usia_18_56_p')->default(0);
            $table->integer('penduduk_usia_18_58_bekerja_l')->default(0);
            $table->integer('penduduk_usia_18_58_bekerja_p')->default(0);
            $table->integer('penduduk_usia_18_58_tidak_bekerja_l')->default(0);
            $table->integer('penduduk_usia_18_58_tidak_bekerja_p')->default(0);
            $table->integer('penduduk_usia_58_keatas_l')->default(0);
            $table->integer('penduduk_usia_58_keatas_p')->default(0);
            $table->integer('penduduk_usia_58_keatas_bekerja_l')->default(0);
            $table->integer('penduduk_usia_58_keatas_bekerja_p')->default(0);
            $table->integer('penduduk_usia_58_keatas_tidak_bekerja_l')->default(0);
            $table->integer('penduduk_usia_58_keatas_tidak_bekerja_p')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            $table->dropColumn([
                'penduduk_usia_18_56_l', 'penduduk_usia_18_56_p',
                'penduduk_usia_18_58_bekerja_l', 'penduduk_usia_18_58_bekerja_p',
                'penduduk_usia_18_58_tidak_bekerja_l', 'penduduk_usia_18_58_tidak_bekerja_p',
                'penduduk_usia_58_keatas_l', 'penduduk_usia_58_keatas_p',
                'penduduk_usia_58_keatas_bekerja_l', 'penduduk_usia_58_keatas_bekerja_p',
                'penduduk_usia_58_keatas_tidak_bekerja_l', 'penduduk_usia_58_keatas_tidak_bekerja_p'
            ]);
        });
    }
};

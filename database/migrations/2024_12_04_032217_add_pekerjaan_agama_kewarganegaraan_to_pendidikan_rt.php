<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            // Mata Pencaharian Pokok
            $table->integer('petani_l')->default(0);
            $table->integer('petani_p')->default(0);
            $table->integer('buruh_tani_l')->default(0);
            $table->integer('buruh_tani_p')->default(0);
            $table->integer('pns_l')->default(0);
            $table->integer('pns_p')->default(0);
            $table->integer('pengrajin_l')->default(0);
            $table->integer('pengrajin_p')->default(0);
            $table->integer('pedagang_l')->default(0);
            $table->integer('pedagang_p')->default(0);
            $table->integer('peternak_l')->default(0);
            $table->integer('peternak_p')->default(0);
            $table->integer('dokter_swasta_l')->default(0);
            $table->integer('dokter_swasta_p')->default(0);
            $table->integer('bidan_swasta_l')->default(0);
            $table->integer('bidan_swasta_p')->default(0);
            $table->integer('tni_polri_l')->default(0);
            $table->integer('tni_polri_p')->default(0);
            $table->integer('pensiunan_tni_polri_l')->default(0);
            $table->integer('pensiunan_tni_polri_p')->default(0);
            $table->integer('pensiunan_pns_l')->default(0);
            $table->integer('pensiunan_pns_p')->default(0);

            // Agama/Aliran Kepercayaan
            $table->integer('islam_l')->default(0);
            $table->integer('islam_p')->default(0);
            $table->integer('kristen_l')->default(0);
            $table->integer('kristen_p')->default(0);
            $table->integer('katholik_l')->default(0);
            $table->integer('katholik_p')->default(0);
            $table->integer('hindu_l')->default(0);
            $table->integer('hindu_p')->default(0);
            $table->integer('budha_l')->default(0);
            $table->integer('budha_p')->default(0);
            $table->integer('khonghucu_l')->default(0);
            $table->integer('khonghucu_p')->default(0);

            // Kewarganegaraan
            $table->integer('wni_l')->default(0);
            $table->integer('wni_p')->default(0);
            $table->integer('wna_l')->default(0);
            $table->integer('wna_p')->default(0);
        });
    }

    public function down()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            // Mata Pencaharian Pokok
            $table->dropColumn([
                'petani_l', 'petani_p',
                'buruh_tani_l', 'buruh_tani_p',
                'pns_l', 'pns_p',
                'pengrajin_l', 'pengrajin_p',
                'pedagang_l', 'pedagang_p',
                'peternak_l', 'peternak_p',
                'dokter_swasta_l', 'dokter_swasta_p',
                'bidan_swasta_l', 'bidan_swasta_p',
                'tni_polri_l', 'tni_polri_p',
                'pensiunan_tni_polri_l', 'pensiunan_tni_polri_p',
                'pensiunan_pns_l', 'pensiunan_pns_p'
            ]);

            // Agama/Aliran Kepercayaan
            $table->dropColumn([
                'islam_l', 'islam_p',
                'kristen_l', 'kristen_p', 
                'katholik_l', 'katholik_p',
                'hindu_l', 'hindu_p',
                'budha_l', 'budha_p',
                'khonghucu_l', 'khonghucu_p'
            ]);

            // Kewarganegaraan
            $table->dropColumn([
                'wni_l', 'wni_p',
                'wna_l', 'wna_p'
            ]);
        });
    }
};
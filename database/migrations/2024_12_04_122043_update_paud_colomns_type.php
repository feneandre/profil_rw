<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            // Ubah tipe kolom PAUD menjadi text
            $table->text('nama_paud')->nullable()->change();
            $table->text('alamat_paud')->nullable()->change();
            $table->text('jumlah_pengajar_paud')->nullable()->change();
            $table->text('jumlah_siswa_paud')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('pendidikan_rt', function (Blueprint $table) {
            $table->string('nama_paud')->nullable()->change();
            $table->string('alamat_paud')->nullable()->change();
            $table->integer('jumlah_pengajar_paud')->default(0)->change();
            $table->integer('jumlah_siswa_paud')->default(0)->change();
        });
    }
};
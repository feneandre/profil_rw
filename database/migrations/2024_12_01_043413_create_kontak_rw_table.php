<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontakRwTable extends Migration
{
    public function up()
    {
        Schema::create('kontak_rw', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelurahan');
            $table->string('nama_rw');
            $table->string('nama_ketua');
            $table->string('nomor_telepon');
            $table->foreignId('rw_id')->constrained('rws')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kontak_rw');
    }
}
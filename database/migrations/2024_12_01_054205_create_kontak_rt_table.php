<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kontak_rt', function (Blueprint $table) {
            $table->id();
            $table->string('nama_rt');
            $table->string('nama_ketua');
            $table->string('nomor_telepon');
            $table->foreignId('rt_id')->constrained('rts')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kontak_rt');
    }
};
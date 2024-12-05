<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pendidikan_rw', function (Blueprint $table) {
            $table->date('tanggal_input')->nullable();
            $table->time('waktu_input')->nullable();
        });
    }

    public function down()
    {
        Schema::table('pendidikan_rw', function (Blueprint $table) {
            $table->dropColumn(['tanggal_input', 'waktu_input']);
        });
    }
};
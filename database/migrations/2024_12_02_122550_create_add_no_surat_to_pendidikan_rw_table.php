<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddNoSuratToPendidikanRwTable extends Migration
{
    public function up()
    {
        Schema::table('pendidikan_rw', function (Blueprint $table) {
            $table->string('no_surat')->after('id');
        });
    }

    public function down()
    {
        Schema::table('pendidikan_rw', function (Blueprint $table) {
            $table->dropColumn('no_surat');
        });
    }
}
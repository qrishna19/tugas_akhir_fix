<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->foreign('id_proyek', 'anggota_ibfk_1')->references('id')->on('proyek')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_dosen', 'anggota_ibfk_2')->references('id_dosen')->on('dosen')->onUpdate('RESTRICT')->onDelete('RESTRICT');
            $table->foreign('id_mahasiswa', 'anggota_ibfk_3')->references('id_mahasiswa')->on('mahasiswa')->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->dropForeign('anggota_ibfk_1');
            $table->dropForeign('anggota_ibfk_2');
            $table->dropForeign('anggota_ibfk_3');
        });
    }
}

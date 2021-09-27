<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyek', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul_proyek', 100);
            $table->text('deskripsi_proyek')->nullable();
            $table->string('jenis_proyek', 40)->nullable();
            $table->string('tahun', 5)->nullable();
            $table->string('image', 100);
            $table->unsignedBigInteger('id_kategori')->nullable()->index('id_kategori');
            $table->string('link_proyek', 40);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyek');
    }
}

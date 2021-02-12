<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaktuReservasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waktu_reservasi', function (Blueprint $table) {
            $table->string('id_waktu', 12);
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('id_layanan', 12);

            $table->foreign('id_layanan')->references('id_layanan')->on('layanan')->onDelete('cascade')->onUpdate('cascade');

            $table->primary('id_waktu');
            $table->unique(['waktu_mulai' , 'id_layanan']);
            $table->unique(['waktu_selesai' , 'id_layanan']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waktu_reservasi');
    }
}

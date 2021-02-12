<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservasi', function (Blueprint $table) {
            $table->string('id_reservasi', 20)->primary();
            $table->date('tanggal_reservasi');
            $table->string('status', 20);
            $table->string('id_pasien', 12);
            $table->string('id_waktu', 12);

            $table->foreign('id_waktu')->references('id_waktu')->on('waktu_reservasi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade')->onUpdate('cascade');


            $table->unique(['tanggal_reservasi' , 'id_waktu']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservasi');
    }
}

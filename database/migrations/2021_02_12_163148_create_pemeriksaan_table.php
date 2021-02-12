<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->string('id_pemeriksaan', 12)->primary();
            $table->string('keluhan', 255);
            $table->string('tambahan', 255)->nullable();;
            $table->date('tanggal_pemeriksaan');
            $table->string('tekanan_darah', 50);
            $table->biginteger('total_biaya');
            $table->string('status', 255);
            $table->string('id_pasien', 12);
            $table->string('id_dokter', 12);

            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_dokter')->references('id_users')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemeriksaan');
    }
}

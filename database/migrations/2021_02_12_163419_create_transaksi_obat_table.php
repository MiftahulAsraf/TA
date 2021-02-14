<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiObatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_obat', function (Blueprint $table) {
            $table->string('id_obat', 12);
            $table->string('id_pemeriksaan', 12);
            $table->integer('jumlah_obat');
            $table->string('petunjuk', 50);

            $table->foreign('id_obat')->references('id_obat')->on('obat')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pemeriksaan')->references('id_pemeriksaan')->on('pemeriksaan')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['id_obat' , 'id_pemeriksaan']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_obat');
    }
}

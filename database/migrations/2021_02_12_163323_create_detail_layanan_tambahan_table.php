<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailLayananTambahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_layanan_tambahan', function (Blueprint $table) {
            $table->string('id_layanan_tambahan', 12);
            $table->string('id_pemeriksaan', 12);
            $table->string('nilai', 50);

            $table->foreign('id_layanan_tambahan')->references('id_layanan_tambahan')->on('layanan_tambahan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pemeriksaan')->references('id_pemeriksaan')->on('pemeriksaan')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['id_layanan_tambahan' , 'id_pemeriksaan'])->index('pk_detail_layanan_tambahan');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_layanan_tambahan');
    }
}

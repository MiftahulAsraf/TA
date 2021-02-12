<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_penyakit', function (Blueprint $table) {
            $table->string('id_penyakit', 12);
            $table->string('id_pemeriksaan', 12);

            $table->foreign('id_penyakit')->references('id_penyakit')->on('penyakit')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pemeriksaan')->references('id_pemeriksaan')->on('pemeriksaan')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['id_penyakit' , 'id_pemeriksaan']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_penyakit');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->string('id_pasien', 12)->primary();
            $table->string('alamat', 155);
            $table->integer('umur');
            $table->string('note', 155)->nullable();
            $table->string('jenis_kelamin', 15);
            $table->string('nomor_telp', 13);
            $table->string('no_rekammedis', 12)->unique();


            $table->foreign('id_pasien')->references('id_users')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}

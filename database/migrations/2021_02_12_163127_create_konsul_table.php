<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsul', function (Blueprint $table) {
            $table->string('id_konsul', 30)->primary();
            $table->string('chat', 200);
            $table->string('from_where', 12);
            $table->string('to_where', 12);
            $table->timestamps();

            $table->foreign('from_where')->references('id_users')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('to_where')->references('id_users')->on('users')->onDelete('cascade')->onUpdate('cascade');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('konsul');
    }
}

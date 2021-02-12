<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id_users', 12)->primary();
            $table->string('username', 20)->unique();
            $table->string('nama_user' , 155);
            $table->string('password', 155);
            $table->string('foto', 255)->nullable();
            $table->string('id_role', 3);


            $table->foreign('id_role')->references('id')->on('role')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

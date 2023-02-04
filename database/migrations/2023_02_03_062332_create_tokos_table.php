<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokos', function (Blueprint $table) {
            $table->id('id_toko');
            $table->foreignId('id_user');
            $table->foreignId('id_level');
            $table->string('nama_toko',50);
            $table->text('deskripsi_toko');
            $table->string('logo_toko',50);
            $table->string('banner',50);
            $table->enum('validate', ['verified', 'unverified'])->default('unverified');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tokos');
    }
};

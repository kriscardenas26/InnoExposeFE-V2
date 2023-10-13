<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('servicio_id');
            $table->string('nombreD');
            $table->integer('idUsuario');
            $table->foreign('persona_id')->references('id')
            ->on('personas')->onDelete('cascade');
            $table->foreign('servicio_id')->references('id')
            ->on('servicios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}

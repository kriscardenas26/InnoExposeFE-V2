<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('subcategoria_id'); 
            $table->string('categoria_id');
            $table->string('nombreS');
            $table->integer('cedulaS')->nullable();
            $table->string('descripcionS');
            $table->string('diaI');
            $table->string('diaF');
            $table->time('horaI');
            $table->time('horaF');
            $table->string('urlImage');
            $table->boolean('estado');
            $table->integer('idUsuario');
            $table->foreign('persona_id')->references('id')
            ->on('personas')->onDelete('cascade');
            $table->foreign('subcategoria_id')->references('id')
            ->on('subcategorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}

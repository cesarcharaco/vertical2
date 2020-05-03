<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_solicitud');
            $table->unsignedBigInteger('id_espacio');
            $table->unsignedBigInteger('id_bloque');
            $table->enum('permanente',['Si','No']);
            $table->string('color');
            $table->enum('status',['Cancelada','Ejecutada','Activa'])->default('Activa');
            $table->foreign('id_espacio')->references('id')->on('espacios')->onDelete('cascade');
            $table->foreign('id_bloque')->references('id')->on('bloques')->onDelete('cascade');
            $table->foreign('id_solicitud')->references('id')->on('solicitudes')->onDelete('cascade');
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
        Schema::dropIfExists('agenda');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_bloque');
            $table->unsignedBigInteger('id_espacio');
            $table->integer('num_bloques');
            $table->text('dirigido');
            $table->text('nombre_actividad');
            $table->string('responsable');
            $table->enum('permanente',['Si','No'])->default('Si');
            $table->date('fecha')->nullable();
            $table->enum('status',['Pendiente','Aprobado','Negado'])->default('Pendiente');
            $table->text('descripcion_actividad');
            $table->integer('num_asistentes');
            $table->unsignedBigInteger('id_cliente');

            $table->foreign('id_bloque')->references('id')->on('bloques')->onDelete('cascade');
            $table->foreign('id_espacio')->references('id')->on('espacios')->onDelete('cascade');
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('solicitudes');
    }
}

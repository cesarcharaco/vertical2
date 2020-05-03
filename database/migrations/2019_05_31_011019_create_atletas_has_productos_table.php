<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtletasHasProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas_has_productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_atleta');
            $table->unsignedBigInteger('id_producto');
            $table->integer('mes');
            $table->enum('status',['Entregado','Pendiente'])->default('Entregado');
            $table->integer('qty')->unsigned()->nullable();

            $table->foreign('id_atleta')->references('id')->on('atletas')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
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
        Schema::dropIfExists('atletas_has_productos');
    }
}

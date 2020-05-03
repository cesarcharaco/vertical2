<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('nacionalidad');
            $table->integer('cedula');
            $table->string('movil')->nullable();
            $table->string('local')->nullable();
            $table->string('correo')->nullable();
            $table->string('acceso');
            $table->unsignedBigInteger('id_cargo');
            $table->timestamps();

            $table->foreign('id_cargo')->references('id')->on('cargos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}

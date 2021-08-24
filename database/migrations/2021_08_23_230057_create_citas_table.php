<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_turno')->unsigned();
            $table->foreign('id_turno')->references('id')->on('turnos');
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->string('descripcion');
            $table->string('estado');
            $table->string('acceso_cliente');
            $table->string('acceso_profesional');
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
        Schema::dropIfExists('citas');
    }
}

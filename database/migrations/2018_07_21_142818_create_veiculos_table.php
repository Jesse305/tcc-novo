<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('modelo');
            $table->string('fabricante');
            $table->year('ano');
            $table->string('cor');
            $table->string('placa');
            $table->timestamps();

            $table->integer('cliente_id')
            ->unsigned();
            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('veiculos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCanastasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canastas', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('descripcion',150);
            $table->string('domiciliopago',150);
            $table->string('domicilioentrega',150);
            $table->date('iniciocompra');
            $table->date('fincompra');
            $table->date('fechaentrega');
            $table->integer('monto')->default(500);
            $table->boolean('activa')->default(0);
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
        Schema::dropIfExists('canastas');
    }
}

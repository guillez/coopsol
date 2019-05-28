<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('canasta_id');
            $table->integer('monto')->default(0);
            $table->integer('cantidad')->default(0);
            $table->boolean('pagado')->default(0);
            $table->string('comentario',250)->nullable();
            $table->boolean('confirmada')->default(0);
            $table->boolean('anulado')->default(0);
            $table->date('fechapago')->nullable();
  	    $table->integer('deleted_at')->default(0);
 	    $table->integer('deleted_by')->default(0);
	    $table->integer('created_by')->default(0);
	    $table->integer('updated_by')->default(0);

            $table->timestamps();

            $table->foreign('usuario_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('canasta_id')
                ->references('id')
                ->on('canastas')
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
        Schema::dropIfExists('compras');
    }
}

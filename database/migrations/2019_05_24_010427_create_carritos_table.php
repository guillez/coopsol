<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carritos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('canasta_id');
            $table->unsignedBigInteger('usuario_id');
            $table->unsignedBigInteger('producto_id');

            $table->double('montounitario', 8, 2);  
            $table->integer('cantidad')->default(0);
            $table->double('montocantidad', 8, 2); 
            $table->double('montoacumulado', 8, 2); 
            $table->integer('orden')->default(0);
            $table->string('comentario',250)->nullable();
            $table->boolean('anulado')->default(0);
            $table->date('fechacarga');

  	    $table->integer('deleted_at')->default(0);
 	    $table->integer('deleted_by')->default(0);
	    $table->integer('created_by')->default(0);
	    $table->integer('updated_by')->default(0);

            $table->timestamps();

            $table->foreign('canasta_id')
                ->references('id')
                ->on('canastas')
                ->onDelete('cascade');

            $table->foreign('usuario_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('producto_id')
                ->references('id')
                ->on('productos')
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
        Schema::dropIfExists('carritos');
    }
}

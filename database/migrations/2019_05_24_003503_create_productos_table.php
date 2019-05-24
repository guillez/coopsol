<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('descripcion',150);
            $table->integer('cantidad')->default(1);
            $table->string('unidad',100)->nullable();
            $table->double('monto', 8, 2);      
            $table->unsignedBigInteger('proveedor_id');         
            $table->unsignedBigInteger('canasta_id');                      
            $table->boolean('activo')->default(0);
  	    $table->integer('deleted_at')->default(0);
 	    $table->integer('deleted_by')->default(0);
	    $table->integer('created_by')->default(0);
	    $table->integer('updated_by')->default(0);

            $table->timestamps();

            $table->foreign('proveedor_id')
                ->references('id')
                ->on('proveedors')
                ->onDelete('cascade');

            $table->foreign('canasta_id')
                ->references('id')
                ->on('canastass')
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
        Schema::dropIfExists('productos');
    }
}

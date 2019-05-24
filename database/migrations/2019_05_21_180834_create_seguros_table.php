<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegurosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguros', function (Blueprint $table) {
            $table->bigIncrements('id');
    
            $table->string('descripcion',250);                                      
            $table->string('direccion',250);
            $table->string('email',250);
            $table->string('telefono',150);
            $table->string('celular',150);    
            //$table->date('created_at')->default(date("Y-m-d"));           
  	    $table->integer('deleted_at')->default(0);
 	    $table->integer('deleted_by')->default(0);
	    $table->integer('created_by')->default(0);
	    $table->integer('updated_by')->default(0);
	   //$table->date('fechanacimiento')->default(date("Y-m-d"));  
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
        Schema::dropIfExists('seguros');
    }
}

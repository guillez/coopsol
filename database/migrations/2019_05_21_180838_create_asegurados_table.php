<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAseguradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('asegurados', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('seguro_id');

  	    $table->integer('deleted_at')->default(0);
 	    $table->integer('deleted_by')->default(0);
	    $table->integer('created_by')->default(0);
	    $table->integer('updated_by')->default(0);

            $table->timestamps();

            $table->foreign('persona_id')
                ->references('id')
                ->on('personas')
                ->onDelete('cascade');

            $table->foreign('seguro_id')
                ->references('id')
                ->on('seguros')
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
        Schema::dropIfExists('asegurados');
    }
}

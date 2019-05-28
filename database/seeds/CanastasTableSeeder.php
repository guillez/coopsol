<?php

use Illuminate\Database\Seeder;

class CanastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Canasta::create([
    	'descripcion'=>'CANASTA JUNIO 2019',
    	'domiciliopago'=>'1',
    	'activa'=>'1',
    	'domicilioentrega'=>'-',
	'iniciocompra'=>'2019-01-01',
	'fincompra'=>'2019-01-01',
	'fechaentrega'=>'2019-01-01',
	'updated_at'=>'2019-01-01',
	'created_at'=>'2019-01-01'

    	]);
           
    }
}

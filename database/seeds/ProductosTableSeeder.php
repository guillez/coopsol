<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Producto::create([
    	'descripcion'=>'Arroz',
    	'cantidad'=>'1',
    	'unidad'=>'1Kg',
    	'monto'=>'30',
    	'proveedor_id'=>'2',
	'updated_at'=>'2019-01-01',
	'created_at'=>'2019-01-01'

    	]);






    }
}

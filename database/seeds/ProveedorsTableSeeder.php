<?php

use Illuminate\Database\Seeder;

class ProveedorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        App\Proveedor::create([
    	'denominacion'=>'Mayorista Leon',
	'updated_at'=>'2019-01-01',
	'created_at'=>'2019-01-01'

    	]);

        App\Proveedor::create([
    	'denominacion'=>'Mayorista Del Puerto',
	'updated_at'=>'2019-01-01',
	'created_at'=>'2019-01-01'
    	]);

        App\Proveedor::create([
    	'denominacion'=>'Otro',
	'updated_at'=>'2019-01-01',
	'created_at'=>'2019-01-01'
    	]);
    }
}

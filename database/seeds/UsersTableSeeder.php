<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // factory(App\User::class,29)->create();

        App\User::create([
    	'name'=>'Guillermo Abel Zdanowicz',
    	'email'=>'ingguillermoz@gmail.com',
    	'password'=>bcrypt('2009sistemas')
    	]);
        App\User::create([
    	'name'=>'Luis Alberto Fernandez',
    	'email'=>'luisalberto.lualfer@gmail.com',
    	'password'=>bcrypt('laf2019')
    	]);
    }

    public function down()
    {
        Schema::dropIfExists('User');
    }
}

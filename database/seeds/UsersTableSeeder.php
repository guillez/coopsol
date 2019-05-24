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
    	'name'=>'guillez',
    	'email'=>'ingguillermoz@gmail.com',
    	'password'=>bcrypt('2009sistemas')
    	]);

    }

    public function down()
    {
        Schema::dropIfExists('User');
    }
}

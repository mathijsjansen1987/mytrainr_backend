<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder{

	public function run(){

		User::create([
			'name' => 'Mathijs Jansen',
			'email'	=> 'mathijs@code.rehab',
			'password' => Hash::make('pass')
		]);

	}
}


?>

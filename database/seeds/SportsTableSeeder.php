<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Sport;

class SportsTableSeeder extends Seeder{

	public function run(){

		$faker = Faker::create();

		foreach(range(0,2) as $index){

			Sport::create([
				'name' => $faker->sentence(1),
			]);

		}

	}
}


?>

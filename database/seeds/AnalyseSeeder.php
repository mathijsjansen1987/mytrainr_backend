<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Analyse;

class AnalyseTableSeeder extends Seeder{

	public function run(){

		$faker = Faker::create();

		foreach(range(0,30) as $index){

			Analyse::create([
				'name' => $faker->sentence(2),
				'description'	=> $faker->sentence(20),
				'date'	=> $faker->date('Y-m-d'),
				'type' => $faker->sentence(1),
			]);

		}

	}
}


?>

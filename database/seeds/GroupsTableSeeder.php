<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Group;

class GroupsTableSeeder extends Seeder{

	public function run(){

		$faker = Faker::create();

		foreach(range(0,30) as $index){

			Group::create([
				'name' => $faker->sentence(1),
				'sport_id'	=> $faker->biasedNumberBetween(0,10),
				'description' => $faker->sentence(10),
			]);

		}

	}
}


?>

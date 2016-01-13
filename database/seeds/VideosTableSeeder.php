<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Video;

class VideosTableSeeder extends Seeder{


	public function run(){

		$faker = Faker::create();

		foreach(range(0,30) as $index){

			Video::create([
				'title' => $faker->sentence(20),
				'url'	=> $faker->imageUrl(600,600)
			]);

		}


	}



}


?>

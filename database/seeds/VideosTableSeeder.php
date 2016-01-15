<?php

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Video;

class VideosTableSeeder extends Seeder{

	public function run(){

		$faker = Faker::create();

		foreach(range(0,30) as $index){

			Video::create([
				'title' => $faker->sentence(1),
				'image_url'	=> $faker->imageUrl(600,600),
				'url'	=> 'https://s3-us-west-2.amazonaws.com/mytrainr/getenkampe/videos/converted/start_mathijs_2.mp4',
				'description' => $faker->sentence(10),
			]);

		}

	}
}


?>

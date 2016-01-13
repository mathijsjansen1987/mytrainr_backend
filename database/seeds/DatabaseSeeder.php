<?php

use Illuminate\Database\Seeder;
use App\Video;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Video::truncate();
        $this->call(VideosTableSeeder::class);
    }
}

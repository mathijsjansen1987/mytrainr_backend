<?php

use Illuminate\Database\Seeder;
use App\Video;
use App\User;
use App\Analyse;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 	DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Video::truncate();
        $this->call(VideosTableSeeder::class);
		User::truncate();
		$this->call(UsersTableSeeder::class);
		Analyse::truncate();
		$this->call(AnalyseTableSeeder::class);

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

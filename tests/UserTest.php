<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends ApiTester
{
	/**
     * A basic functional test example.
     *
     * @return void
     */
	public function it_fetches_users()
	{
		$this->times(5)->makeUser();

		$this->getJson('api/v1/users');

		$this->assertResponseOk();
	}


	public function makeUser($userFields = []){

		$user = array_merge([
			'name' => $this->fake->sentence(5),
			'email' => $this->fake->email()
			'password' => $this->fake->sentence
		], $userFields);

		while($this->times --) User::create($user);

	}


	private function times($count){
		$this->times = $count;
	}
}

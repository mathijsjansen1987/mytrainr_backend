<?php

use Faker\Factory as Faker;

class ApiTester extends TestCase{

	protected $fake;
	protected $times = 1;

	function __construct(){

		$this->fake = Faker::create();

	}


}


?>

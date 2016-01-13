<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Response;
use App\Mytrainr\Transformers\userTransformer;

class UserController extends ApiController
{

	/**
	* @var Mytrainr\Transformers\VideoTransformer
	*/
	protected $userTransformer;

	function __construct(UserTransformer $userTransformer){

		$this->userTransformer = $userTransformer;
	}

	public function index(){

		$users = User::all();

		return $this->setStatusCode(200)->respond([
			"data" => $this->userTransformer->transformCollection($users->all()),
			"pagination_info" => 'test'
		]);
	}

	public function show($id){

		$user = User::find($id);

		if(!$user)
		{
			return $this->respondNotFound('User does not exist');
		}

		return $this->setStatusCode(200)->respond([
			"data" => $this->userTransformer->transform($user)
		]);
	}

}

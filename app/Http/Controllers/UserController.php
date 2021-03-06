<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Video;
use Response;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Mytrainr\Transformers\UserTransformer;
use App\Mytrainr\Transformers\videoTransformer;
use Hash;

class UserController extends ApiController
{

	/**
	* @var Mytrainr\Transformers\VideoTransformer
	*/
	protected $userTransformer;
	protected $videoTransformer;

	function __construct(UserTransformer $userTransformer, VideoTransformer $videoTransformer){

		$this->userTransformer = $userTransformer;
		$this->videoTransformer = $videoTransformer;
	}

	public function index(){

		$users = User::all();

		return $this->setStatusCode(200)->respond([
			"users" => $this->userTransformer->transformCollection($users->all()),
			//"pagination_info" => 'test'
		]);
	}

	public function show($id){

		$user = User::find($id);
		$videos = $user->videos()->get();


		if(!$user)
		{
			return $this->respondNotFound('User does not exist');
		}

		return $this->setStatusCode(200)->respond([
			"user" => $this->userTransformer->transform($user),
			"video" => $videos
		]);
	}


	public function store(){

		$input = Input::all();
		$input = $input['user'];


		$validator = Validator::make($input, [
			'name' => 'required',
			'emailaddress' => 'required',
			'password' => 'required'
		]);

		if ($validator->fails())
			return $this->respondNotFound($validator->errors());

		if (User::where('email', '=', Input::get('emailaddress'))->exists())
			return $this->respondNotFound("emailaddress allready in use, choose another email");

		$user = new User();
		$user->name = $input['name'];
		$user->email = $input['emailaddress'];
		$user->password = Hash::make($input['password']);
		$user->save();

		return $this->setStatusCode(200)->respond([
			"user" => $this->userTransformer->transform($user),
			"message" => "succesfully created the user account, feel free to login trough http://mytrainr.nl"
		]);

	}

}

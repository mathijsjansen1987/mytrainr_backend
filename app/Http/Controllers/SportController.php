<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sport;
use App\User;
use Response;
use Input;
use App\Mytrainr\Transformers\SportTransformer;

class SportController extends ApiController
{

	/**
	* @var Mytrainr\Transformers\VideoTransformer
	*/
	protected $sporterTransformer;

	function __construct(SportTransformer $sportTransformer)
	{
		$this->sportTransformer = $sportTransformer;
	}

	public function index($id = null){

		$sports = $this->getSports($id);

		if(!$sports)
			return $this->respondNotFound('Sports not found');

		return $this->setStatusCode(200)->respond([
			"sport" => $this->sportTransformer->transformCollection($sports->all()),
			//"pagination_info" => 'test'
		]);
	}

	public function show($id){

		$sport = Sport::find($id);

		if(!$sport)
			return $this->respondNotFound('Sport does not exist');

		return $this->setStatusCode(200)->respond([
			"sport" => $this->sportTransformer->transform($sporter)
		]);
	}

	public function getSports($id){
		$sports = $id ? User::findOrFail($id)->sports : Sport::all();
		return $sports;
	}

}

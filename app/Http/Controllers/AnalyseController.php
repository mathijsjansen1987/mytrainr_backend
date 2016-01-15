<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Analyse;
use App\User;
use Response;
use Input;
use App\Mytrainr\Transformers\AnalyseTransformer;

class AnalyseController extends ApiController
{

	/**
	* @var Mytrainr\Transformers\VideoTransformer
	*/
	protected $analyseTransformer;

	function __construct(AnalyseTransformer $analyseTransformer)
	{
		$this->analyseTransformer = $analyseTransformer;
	}

	public function index($id = null){

		$analysis = $this->getAnalyses($id);

		if(!$analysis)
			return $this->respondNotFound('User has no analyses');


		return $this->setStatusCode(200)->respond([
			"analyse" => $this->analyseTransformer->transformCollection($analysis->all()),
			//"pagination_info" => 'test'
		]);
	}

	public function show($id){

		$analyse = Analyse::find($id);

		if(!$analyse)
			return $this->respondNotFound('Analyse does not exist');

		return $this->setStatusCode(200)->respond([
			"analyse" => $this->analyseTransformer->transform($analyse)
		]);
	}

	public function getAnalyses($id){
		$analyses = $id ? User::findOrFail($id)->analyses : Analyse::all();
		return $analyses;
	}

}

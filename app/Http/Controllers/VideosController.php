<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Video;
use Response;
use App\Mytrainr\Transformers\VideoTransformer;

class VideosController extends ApiController
{

	/**
	* @var Mytrainr\Transformers\VideoTransformer
	*/
	protected $videoTransformer;

	function __construct(VideoTransformer $videoTransformer){

		$this->videoTransformer = $videoTransformer;
	}

	public function index(){

		$videos = Video::all();


		return $this->setStatusCode(200)->respond([
			"data" => $this->videoTransformer->transformCollection($videos->all()),
			"pagination_info" => 'test'
		]);

		// return Response::json(,200);
	}

	public function show($id){

		$video = Video::find($id);

		if(!$video)
		{
			return $this->respondNotFound('Video does not exist');
		}

		return $this->setStatusCode(200)->respond([
			"data" => $this->videoTransformer->transform($video)
		]);
	}


	public function store(){

		dd('store');
	}

}

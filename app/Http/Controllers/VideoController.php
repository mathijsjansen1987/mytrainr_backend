<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Video;
use App\User;
use Response;
use App\Mytrainr\Transformers\VideoTransformer;

class VideoController extends ApiController
{

	/**
	* @var Mytrainr\Transformers\VideoTransformer
	*/
	protected $videoTransformer;

	function __construct(VideoTransformer $videoTransformer)
	{
		$this->videoTransformer = $videoTransformer;
	}

	public function index($id = null){

		$videos = $id ? @User::find($id)->videos : Video::all();

		if(!$videos)
			return $this->respondNotFound('User has no videos');


		return $this->setStatusCode(200)->respond([
			"data" => $this->videoTransformer->transformCollection($videos->all()),
			"pagination_info" => 'test'
		]);
	}

	public function show($id){

		$video = Video::find($id);

		if(!$video)
			return $this->respondNotFound('Video does not exist');

		return $this->setStatusCode(200)->respond([
			"data" => $this->videoTransformer->transform($video)
		]);
	}

}

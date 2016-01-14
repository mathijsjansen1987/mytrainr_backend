<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Video;
use App\User;
use Response;
use Input;
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

		$videos = $this->getVideos($id);

		if(!$videos)
			return $this->respondNotFound('User has no videos');


		return $this->setStatusCode(200)->respond([
			"videos" => $this->videoTransformer->transformCollection($videos->all()),
			"pagination_info" => 'test'
		]);
	}

	public function show($id){

		$video = Video::find($id);

		if(!$video)
			return $this->respondNotFound('Video does not exist');

		return $this->setStatusCode(200)->respond([
			"video" => $this->videoTransformer->transform($video)
		]);
	}

	public function getVideos($id){
		$videos = $id ? User::findOrFail($id)->videos : Video::all();
		return $videos;
	}

}

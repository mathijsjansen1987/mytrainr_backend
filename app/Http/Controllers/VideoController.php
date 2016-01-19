<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Video;
use App\User;
use Response;
use Validator;
use Illuminate\Support\Facades\Input;
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
			//"pagination_info" => 'test'
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

	public function store(){

		$input = Input::all();
		$input = $input['video'];

		$validator = Validator::make($input, [
			'title' => 'required',
			'description' => 'required',
			'url' => 'required',
		]);

		if ($validator->fails())
			return $this->respondNotFound($validator->errors());

		$video = new Video();
		$video->title = $input['title'];
		$video->description = $input['description'];
		$video->url = $input['url'];
		$video->save();

		return $this->setStatusCode(200)->respond([
			"video" =>  $this->videoTransformer->transform($video),
			"message" => "succesfully created the video"
		]);

	}

	public function destroy($id){

		$video = Video::find($id);
		$video->delete();

		return $this->setStatusCode(200)->respond([
			"message" => "succesfully deleted the video"
		]);
	}

}

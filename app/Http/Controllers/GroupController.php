<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Group;
use App\User;
use Response;
use Input;
use App\Mytrainr\Transformers\GroupTransformer;

class GroupController extends ApiController
{

	/**
	* @var Mytrainr\Transformers\VideoTransformer
	*/
	protected $groupTransformer;

	function __construct(GroupTransformer $groupTransformer)
	{
		$this->groupTransformer = $groupTransformer;
	}

	public function index($id = null){

		$groups = $this->getGroups($id);

		if(!$groups)
			return $this->respondNotFound('No groups found');

		return $this->setStatusCode(200)->respond([
			"group" => $this->groupTransformer->transformCollection($groups->all()),
			//"pagination_info" => 'test'
		]);
	}

	public function show($id){

		$group = Group::find($id);

		if(!$group)
			return $this->respondNotFound('Group does not exist');

		return $this->setStatusCode(200)->respond([
			"group" => $this->groupTransformer->transform($group)
		]);
	}

	public function getGroups($id){
		$groups = $id ? User::findOrFail($id)->groups : Group::all();
		return $groups;
	}

}

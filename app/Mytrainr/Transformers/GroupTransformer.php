<?php namespace App\Mytrainr\Transformers;


class GroupTransformer extends Transformer{

	public function transform($group)
	{
		return [
			'id' => $group['id'],
			'name' => $group['name'],
			'description' => $group['description'],
			'sport_id' => $group['sport_id'],
		];
	}

}

?>

<?php namespace App\Mytrainr\Transformers;


class SportTransformer extends Transformer{

	public function transform($sport)
	{
		return [
			'id' => $sport['id'],
			'name' => $sport['name'],
		];
	}

}

?>

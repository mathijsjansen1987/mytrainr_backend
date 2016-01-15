<?php namespace App\Mytrainr\Transformers;


class AnalyseTransformer extends Transformer{

	public function transform($analyse)
	{
		return [
			'id' => $analyse['id'],
			'name' => $analyse['name'],
			'description' => $analyse['description'],
			'date' => $analyse['date'],
			'type' => $analyse['type']
		];
	}

}

?>

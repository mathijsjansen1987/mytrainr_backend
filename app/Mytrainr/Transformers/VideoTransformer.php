<?php namespace App\Mytrainr\Transformers;


class VideoTransformer extends Transformer{

	public function transform($video)
	{
		return [
			'name' => $video['title'],
			'url' => $video['url']
		];
	}

}

?>

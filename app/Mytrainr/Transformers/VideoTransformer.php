<?php namespace App\Mytrainr\Transformers;


class VideoTransformer extends Transformer{

	public function transform($video)
	{
		return [
			'id' => $video['id'],
			'title' => $video['title'],
			'url' => $video['url']
		];
	}

}

?>

<?php namespace App\Mytrainr\Transformers;


class UserTransformer extends Transformer{

	public function transform($user)
	{
		return [
			'name' => $user['name'],
			'emailaddress' => $user['email']
		];
	}

}

?>

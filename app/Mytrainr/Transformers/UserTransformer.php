<?php namespace App\Mytrainr\Transformers;


class UserTransformer extends Transformer{

	public function transform($user)
	{
		return [
			'id' => $user['id'],
			'name' => $user['name'],
			'emailaddress' => $user['email']
		];
	}

}

?>

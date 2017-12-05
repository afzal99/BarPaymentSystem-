<?php

namespace App\Transformers;
use App\User;

class UserTransformer extends \League\Fractal\TransformerAbstract{

        public function transform(User $user)
        {
            return [
                'fname' => $user->fname,
                'lname' => $user->lname,
                'email' => $user->email,
                'avatar'  => $user->avatar()
            ];

        }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\User;
use App\Transformers\UserTransformer;

class RegisterController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        $user= new User;

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt("123123");
        $user->contact = $request->contact;
        $user->nfc = $request->nfc;
        $user->secret = $request->secret;
        $user->role_id = $request->role_id;
        

        $user->save();

        return fractal()
        ->item($user)
        ->transformWith(new UserTransformer)
        ->toArray();

    }
}

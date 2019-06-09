<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use App\User;

class userController extends Controller
{   
    public function errorCreator($error){
        $raiseError = (object) [
            "id" => 0,
            "name" => "",
            "email" => "",
            "remember_token" => "",
            'error' => $error, 
            "error_type" => "auth error"
        ];
        return $raiseError;
    }

    public function register(request $request){
        $user = User::where("email", $request->email)->first();
        if($user!=NULL){
            return new UserResource($this->errorCreator("Existed Account"));
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = Hash::make($request->email.$request->password);
        if( $user->save() ){
            return new UserResource($user);
        } else {
            return new UserResource($this->errorCreator("Some thing wrong"));
        }
    }

    public function login(request $request){
        $user = User::where("email", $request->email)->first();
        if($user==NULL){
            return new UserResource($this->errorCreator("Wrong email or password"));
        }
        if (Hash::check($request->password, $user->password)) {
            return new UserResource($user);
        } else {
            return new UserResource($this->errorCreator("Wrong email or password"));
        }
    }

    public function rememberTokenCheck(request $request){
        $user = User::where("id", $request->id)
            ->where("remember_token", $request->remember_token)
            ->first();
        if($user==NULL){
            return new UserResource($this->errorCreator("token invalid"));
        } else {
            return new UserResource($user);
        }
    }
}

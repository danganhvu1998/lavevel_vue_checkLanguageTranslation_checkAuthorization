<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userArticleController extends Controller
{   
    public function __construct()
    {
        $this->middleware('checkAuth');
    }

    public function write(request $request){
        return $request;
    }
}

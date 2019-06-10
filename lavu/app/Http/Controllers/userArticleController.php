<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Http\Resources\ArticleResource;

class userArticleController extends Controller
{   
    public function __construct()
    {
        $this->middleware('checkAuth');
    }

    public function write(request $request){
        $article = new Articles;
        $article->title = $request->article_title;
        $article->body = $request->article_body;
        $article->user_id = $request->user_id;
        if($article->save()){
            return $article;
        }
    }
}

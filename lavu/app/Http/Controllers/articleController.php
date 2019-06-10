<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Http\Resources\ArticleResource;

class articleController extends Controller
{
    public function read(){
        $articles = Articles::orderBy('created_at', 'desc')->paginate(5);
        return ArticleResource::collection($articles);
    }
}

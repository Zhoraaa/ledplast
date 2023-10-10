<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleType;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view("index",[
            "all_articles"=>$articles
        ]);
        
    }

    public function create_article(Request $request)
    {
        // dd($request);
        $request->validate([
            "name" => "required|max:50",
            "text" => "required|max:32000",
            // "image" => "required|max:50",
            // "article_type_id" => "required",

        ],[ 
            "name.required"=>"Поле обязательно для заполнения",
            "text.required"=>"Поле обязательно для заполнения",
            // "image.required"=>"Поле обязательно для заполнения",
            // "article_type_id.required"=>"Поле обязательного заполнения",
            
            "name.max"=>"Название статьи должно содержать не больше 50 символов",
            // "image.max"=>"Длина данного поля должна содержать не больше 50 символов",

        ]);

        $article_info = $request->all();

        Article::create([
            "name"=> $article_info["name"],
            "text"=> $article_info["text"],
            // "image"=> $article_info["image"],
            // "article_type_id"=> $article_info["article_type"],

        ]);
        dd(23456);
        // return redirect("/");
    }
}

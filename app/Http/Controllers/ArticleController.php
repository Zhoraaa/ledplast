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

        $request->validate([
            "title" => "required|max:50",
            "description" => "required",
            "cost" => "required|numeric",
            "duration" => "required|digits:value",
            "category_id" => "required",

        ],[ 
            "title.required"=>"Поле обязательно для заполнения",
            "description.required"=>"Поле обязательно для заполнения",
            "cost.required"=>"Поле обязательно для заполнения",
            "duration.required"=>"Поле обязательно для заполнения",
            "category_id.required"=>"Поле обязательного заполнения",
            
            "title.max"=>"Название курса должно содержать не больше 50 символов",
            
            "cost.numeric"=>"Цена должна состоять из цифр",

        ]);

        $article_info = $request->all();

        Article::create([
            "title"=> $article_info["title"],
            "description"=> $article_info["description"],
            "cost"=> $article_info["cost"],
            "duration"=> $article_info["duration"],
            "category_id"=> $article_info["category"],

        ]);

        return redirect("/");
    }
}

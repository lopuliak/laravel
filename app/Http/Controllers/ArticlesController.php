<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticlesController extends Controller
{
    //
    public function index(){
      //$articles = DB::table(articles)->get();
      $articles = Article::all();
      return view('blog.index',compact('articles'));
    }
}

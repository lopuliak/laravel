<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Article;
class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::all();

    	return view('cms.articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cms.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // validate the data
        $this->validate($request, array(
                'title'         => 'required|max:255',
                'summary'      => 'required',
                'content' => 'required'
            ));
        // store in the database
        $article = new Article;
        $article->title = $request->title;
        $article->slug = str_slug($article->title);
        $article->summary = $request->summary;
        $article->content = $request->content;
        $article->seen =  $request->seen;
        if ($article->seen == null) $article->seen = false;
        $article->active = $request->active;
        if ($article->active == null) $article->active = false;
        $article->seo_title = $request->seo_title;
        $article->seo_key = $request->seo_key;
        $article->seo_desc = $request->seo_desc;
        $article->save();
        return redirect()->route('articles.index', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        return view('cms.articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $article = Article::find($id);
        // return the view and pass in the var we previously created
        return view('cms.articles.edit')->withArticle($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // Validate the data
        $article = Article::find($id);
        $this->validate($request, array(
              'title' => 'required|max:255',
              'summary'      => 'required',
              'content' => 'required'
          ));
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->slug = str_slug($article->title);

        $article->summary = $request->input('summary');
        $article->content = $request->input('content');
        $article->seen =  $request->input('seen');
        if ($article->seen == null) $article->seen = false;
        $article->active =  $request->input('active');
        if ($article->active == null) $article->active = false;
        $article->seo_title = $request->input('seo_title');
        $article->seo_key = $request->input('seo_key');
        $article->seo_desc = $request->input('seo_desc');
        $article->save();

        // redirect with flash data to posts.show
        return redirect()->route('articles.show', $article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::find($id);
    	$article->delete();

    	return redirect()->route('articles.index');

    }
}

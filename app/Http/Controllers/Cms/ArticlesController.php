<?php

namespace App\Http\Controllers\Cms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Article;
use App\Category;
use App\Tag;

class ArticlesController extends Controller
{
    public function __construct()
	{
    	parent::__construct();

    	//$this->middleware('acl');
    	$this->breadcrumbs->addCrumb('Dashboard', 'cms');
    	$this->breadcrumbs->addCrumb('Articles', 'articles');
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::all();
        /*
        $articles = Article::orderBy('created_at', 'desc')->simplePaginate(3);
    	return view('cms.articles.index')->with('articles', $articles);
        $articles = Article::all();
        */
    	return view('cms.articles.index')
        	->with('articles', $articles)->with('breadcrumbs', $this->breadcrumbs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');
        return view('cms.articles.create')->with('categories', $categories)->with('tags', $tags);

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
        $article->seen =  $request->input('seen',0);
        $article->active = $request->input('active',0);
        $article->category_id = $request->category_id;
        $article->seo_title = $request->seo_title;
        $article->seo_key = $request->seo_key;
        $article->seo_desc = $request->seo_desc;
        $article->save();
        $article->tags()->sync($request->input('tag_list'), false);
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
        $categories = Category::pluck('name', 'id');
        $tags = Tag::pluck('name', 'id');

        // return the view and pass in the var we previously created
        return view('cms.articles.edit')->withArticle($article)->withCategories($categories)->withTags($tags);
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
        $article = Article::find($id);;
        $article->title = $request->input('title');
        $article->slug = str_slug($article->title);

        $article->summary = $request->input('summary');
        $article->content = $request->input('content');
        $article->seen =  $request->input('seen',0);
        $article->active =  $request->input('active',0);
        $article->category_id = $request->input('category_id');
        $article->seo_title = $request->input('seo_title');
        $article->seo_key = $request->input('seo_key');
        $article->seo_desc = $request->input('seo_desc');
        $article->save();

        $article->tags()->sync($request->input('tag_list'));

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

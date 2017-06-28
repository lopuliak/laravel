<?php
namespace App\Http\Controllers\Cms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CategoriesController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('cms.categories.index')
            ->with('categories', $categories);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('cms.categories.create')->with('categories', $categories);
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
        $this->validate($request, array(
                'name' => 'required|max:255',
            ));
        // store in the database
        $category = new Category;
        $category->name = $request->name;
        $category->pid = $request->pid?$request->pid:0;
        $category->sort = $request->sort;
        $category->save();
        return redirect()->route('categories.index');
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
        $category = Category::find($id);
       return view('cms.categories.show')
                    ->with('category', $category);
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
        $category = Category::find($id);
        $categories = Category::all();

        // return the view and pass in the var we previously created
        return view('cms.categories.edit')->withCategory($category)->with('categories', $categories);
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

        $category = Category::find($id);

        $this->validate($request, array(
           'name' => 'required|max:255',
        ));
        $category->name = $request->input('name');
        $category->pid = $request->input('pid');
        $category->sort = $request->input('sort');
        $category->save();
        return redirect()->route('categories.index');
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
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}

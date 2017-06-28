<?php
namespace App\Http\Controllers\Cms;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('cms.tags.index')
            ->with('tags', $tags);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.tags.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
                'name' => 'required|max:50',
            ));
        // store in the database
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        return redirect()->route('tags.index');
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
        $tag = Tag::find($id);

        return view('cms.tags.edit')->withTag($tag);
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

                $tag = Tag::find($id);
                $this->validate($request, array(
                        'name' => 'required|max:50',
                    ));
                $tag->name = $request->name;
                $tag->save();
                return redirect()->route('tags.index');
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
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('tags.index');
    }
}

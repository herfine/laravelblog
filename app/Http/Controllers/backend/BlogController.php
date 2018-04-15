<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Posts;
// use App\Http\Controllers\Controller;

class BlogController extends backendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $limit=5;
    public function index()
    {
        $posts = Posts::with('author')->paginate($this->limit);
        return view('backend.blog.index', compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Posts $posts)
    {
        return view('backend.blog.create', compact("posts"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'excerpt' => 'required',
            'content' => 'required',
        ]);

        $data=$request->all();
        $data['author_id']=$request->user()->id;
        \App\Posts::create($data);

        return redirect(route("backend.blog.index"))->with("message", "Your post was created successfully");
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
        $posts = Posts:findORFail($id);
        return view("backend.blog.edit", compact("posts"));
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
        $post = Posts::findOrFail($id);
        $data = $request->all();
        $post->update($data);
        return redirect(route("backend.blog.index")) with("message","Your post was updated successfully");
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
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Post;
use App\Tag;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.create')->with('categories',Category::all())->with('tags',Tag::all());
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

        $this->validate($request,[
          'title' => 'required',
          'featured' => 'required|image',
          'content' => 'required',
          'category_id' => 'required',
          'tags' => 'required',
        ]);


        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('upload/posts',$featured_new_name);

        $post = Post::create([
          'title' => $request->title,
          'content' => $request->content,
          'featured' => 'upload/posts/' . $featured_new_name,
          'category_id' => $request->category_id,
          'slug' => Str::slug($request->title, '-'),
        ]);
        $post->tags()->attach($request->tags);

        Session::flash('success','New Post Created');
        return redirect()->back();
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
        $post = Post::find($id);
        return view('admin.posts.edit')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
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
      $this->validate($request,[
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required',
        'featured' => 'image'
      ]);
      $post = Post::find($id);
      if($request->hasFile('featured')){
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('upload/posts',$featured_new_name);
        $post->featured = 'upload/posts/' .$featured_new_name;
      }
      $post->title = $request->title;
      $post->content = $request->content;
      $post->category_id = $request->category_id;
      $post->save();

      $post->tags()->sync($request->tags);
      Session::flash('success','Successfully Edited Post');
      return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','The Post was just trushed');
        return redirect()->back();
    }

    public function trashed()
    {
      // code...
      $posts = Post::onlyTrashed()->get();
      return view('admin.posts.trashed')->with('posts',$posts);

    }

    public function kill($id)
    {
      // code...
      $post = Post::withTrashed()->where('id',$id)->first();
      $post->forceDelete();
      Session::flash('success','Permanently deleted this post!!');
      return redirect()->back();
    }

    public function restore($id)
    {
      // code...
      $post = Post::withTrashed()->where('id',$id)->first();
      $post->restore();
      return redirect()->route('posts');

    }
}

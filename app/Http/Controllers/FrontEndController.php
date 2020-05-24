<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $latest_category_posts1 = Category::orderBy('created_at','desc')->first()->posts->take(3);
      $latest_category_posts2 = Category::orderBy('created_at','desc')->get()->skip(1)->first()->posts->take(3);
      return view('index')
              ->with('title',Setting::first()->site_name)
              ->with('categories',Category::take(6)->get())
              ->with('first_post',Post::orderBy('created_at','desc')->first())
              ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
              ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
              ->with('latest_category_posts1',$latest_category_posts1)
              ->with('latest_category_posts2',$latest_category_posts2)
              ->with('info',Setting::first());
    }

    public function postSingle($slug)
    {

      $post = Post::where('slug',$slug)->first();
      if($post)
      {
        $nextId = Post::where('id','>',$post->id)->min('id');
        $prevId = Post::where('id','<',$post->id)->max('id');
        return view('single')
                ->with('title',$post->title)
                ->with('categories',Category::take(6)->get())
                ->with('post',$post)
                ->with('tags',Tag::all())
                ->with('next',Post::find($nextId))
                ->with('prev',Post::find($prevId))
                ->with('info',Setting::first());
      }
      else{


      }


    }

    public function categorySingle($id)
    {
      $category = Category::find($id);
      return view('category')
              ->with('category',$category)
              ->with('title',$category->name)
              ->with('categories',Category::take(6)->get())
              ->with('tags',Tag::all())
              ->with('info',Setting::first());

    }

    public function tagSingle($id)
    {
      $tag = Tag::find($id);
      return view('tag')
              ->with('tag',$tag)
              ->with('title','Tag:'.$tag->tag)
              ->with('categories',Category::take(6)->get())
              ->with('tags',Tag::all())
              ->with('info',Setting::first());

    }
}

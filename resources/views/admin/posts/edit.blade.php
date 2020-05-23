@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <strong>Edit Post</strong><br>{{ $post->title }}
  </div>
  <div class="card-body">
    @include('admin.include.error')
    <form class="" action="{{ route('post.update',['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" value="{{ $post->title }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="image">Featured Image</label>
        <input type="file" name="featured" value="" class="form-control">
      </div>
      <div class="form-group">
        <label for="category_id">Select a category</label>
        <select class="form-control" name="category_id" id="category_id">
          @foreach($categories as $cateogry)
          <option value="{{ $cateogry->id }}" @if($cateogry->id == $post->category_id) Selected @endif >{{ $cateogry->name }}</option>
          @endforeach

        </select>

      </div>
      <div class="form-group">
        <label for="">Seletc Tags</label>
        @foreach($tags as $tag)
        <div class="form-check">

          <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ 'checkboxid'.$tag->id }}"

          @foreach($post->tags as $t)
          @if($t->id == $tag->id)

          checked

          @endif

          @endforeach

          >
          <label class="form-check-label" for="{{ 'checkboxid'.$tag->id }}">
          {{ $tag->tag }}
          </label>
        </div>
        @endforeach
      </div>


      <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" rows="8" cols="80" class="form-control">{{ $post->content }}</textarea>
      </div>
      <div class="text-center">
        <button type="submit" name="button" class="btn btn-success">Update Post</button>

      </div>

    </form>

  </div>

</div>
@endsection

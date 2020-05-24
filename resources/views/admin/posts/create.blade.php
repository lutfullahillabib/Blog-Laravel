@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    Create New Post
  </div>
  <div class="card-body">
    @include('admin.include.error')
    <form class="" action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" value="" class="form-control">
      </div>

      <div class="form-group">
        <label for="image">Featured Image</label>
        <input type="file" name="featured" value="" class="form-control">
      </div>
      <div class="form-group">
        <label for="category_id">Select a category</label>
        <select class="form-control" name="category_id" id="category_id">
          @foreach($categories as $cateogry)
          <option value="{{ $cateogry->id }}">{{ $cateogry->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="">Seletc Tags</label>
        @foreach($tags as $tag)
        <div class="form-check">

          <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="{{ 'checkboxid'.$tag->id }}">
          <label class="form-check-label" for="{{ 'checkboxid'.$tag->id }}">
          {{ $tag->tag }}
          </label>
        </div>
        @endforeach
      </div>

      <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" rows="8" cols="80" class="form-control" id="content"></textarea>
      </div>
      <div class="text-center">
        <button type="submit" name="button" class="btn btn-success">Store Post</button>
      </div>

    </form>

  </div>

</div>
@endsection

@section('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('#content').summernote();
});
</script>
@endsection

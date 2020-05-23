@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    Update Tag
  </div>
  <div class="card-body">
    @include('admin.include.error')
    <form class="" action="{{ route('tag.update',['id'=> $tag->id]) }}" method="post">
      @csrf

      <div class="form-group">
        <label for="tag_name">Tag Name</label>
        <input type="text" name="tag_name" value="{{ $tag->tag }}" id="tag_name" class="form-control">
      </div>

      <div class="text-center">
        <button type="submit" name="button" class="btn btn-success">Update Tag</button>
      </div>

    </form>

  </div>

</div>
@endsection

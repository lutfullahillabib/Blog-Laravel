@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    Create New Post
  </div>
  <div class="card-body">
    @include('admin.include.error')
    <form class="" action="{{ route('tag.store') }}" method="post">
      @csrf

      <div class="form-group">
        <label for="tag_name">Tag Name</label>
        <input type="text" name="tag_name" value="" id="tag_name" class="form-control">
      </div>

      <div class="text-center">
        <button type="submit" name="button" class="btn btn-success">Store Tag</button>
      </div>

    </form>

  </div>

</div>
@endsection

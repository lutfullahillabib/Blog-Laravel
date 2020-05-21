@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <h2>Edit {{ $category->name }}</h2>
  </div>
  <div class="card-body">
    @include('admin.include.error')
    <form class="" action="{{ route('category.update',['id' => $category->id ]) }}" method="post">
      @csrf

      <div class="form-group">
        <label for="title">Category Name</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
      </div>
      <div class="text-center">
        <button type="submit" name="button" class="btn btn-success">Update Category</button>

      </div>

    </form>

  </div>

</div>
@endsection

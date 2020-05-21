@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    Create New Category
  </div>
  <div class="card-body">
    
    @include('admin.include.error')
    <form class="" action="{{ route('category.store') }}" method="post">
      @csrf

      <div class="form-group">
        <label for="title">Category Name</label>
        <input type="text" name="name" value="" class="form-control">
      </div>
      <div class="text-center">
        <button type="submit" name="button" class="btn btn-success">Create Category</button>

      </div>

    </form>

  </div>

</div>
@endsection

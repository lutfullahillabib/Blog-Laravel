@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    Create New Post
  </div>
  <div class="card-body">
    @include('admin.include.error')
    <form class="" action="{{ route('user.store') }}" method="post">
      @csrf

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="" class="form-control">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="" class="form-control">
      </div>

      <div class="text-center">
        <button type="submit" name="button" class="btn btn-success">Create User</button>
      </div>

    </form>

  </div>

</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <h2>All Categories</h2>
  </div>
  <div class="card-body">

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Post Name</th>
          <th scope="col">Edit</th>
          <th scope="col">Trashed</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($posts as $post)
        <tr scop="row">
          <td> <img src="{{ $post->featured }}" alt="" width="100px" height="50px"> </td>
          <td>{{ $post->title }}</td>
          <td>
            <a href="{{ route('post.edit',['id'=>$post->id]) }}" class="btn btn-info">Edit</a>
          </td>
          <td><a href="{{ route('post.destroy',['id'=>$post->id]) }}" class="btn btn-danger">Trash</a></td>
        </tr>
        @endforeach

      </tbody>

    </table>

  </div>

</div>
@endsection

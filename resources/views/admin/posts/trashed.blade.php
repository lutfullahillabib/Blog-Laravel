@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    Trashed Posts
  </div>
  <div class="card-body">

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Post Name</th>
          <th scope="col">Retore</th>
          <th scope="col">Destroy</th>
        </tr>
      </thead>
      <tbody>
        @if($posts->count() > 0)
          @foreach ($posts as $post)
          <tr scop="row">
            <td> <img src="{{ $post->featured }}" alt="" width="100px" height="50px"> </td>
            <td>{{ $post->title }}</td>
            <td>
              <a href="{{ route('post.restore',['id'=>$post->id]) }}" class="btn btn-sm btn-success">Restore</a>
            </td>
            <td><a href="{{ route('post.kill',['id'=>$post->id]) }}" class="btn btn-sm btn-danger">Delete</a></td>
          </tr>
          @endforeach
        @else
          <tr>
            <th scope="col" colspan="4" class="text-center"> No Trashed Posts</th>
          </tr>
        @endif

      </tbody>

    </table>

  </div>

</div>
@endsection

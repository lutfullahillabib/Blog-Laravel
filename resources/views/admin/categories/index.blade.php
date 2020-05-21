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
          <th scope="col">Category Name</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
        <tr scop="row">
          <td>{{ $category->name }}</td>
          <td>
            <a href="{{ route('category.edit',['id' => $category->id ]) }}" class="btn btn-info">Edit</a>
          </td>
          <td><a href="{{ route('category.destroy',['id' => $category->id ]) }}" class="btn btn-danger">Delete</a></td>
        </tr>
        @endforeach

      </tbody>

    </table>

  </div>

</div>
@endsection

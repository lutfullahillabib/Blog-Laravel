@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <h2>Tags</h2>
  </div>
  <div class="card-body">

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Tag Name</th>
          <th scope="col">Edit</th>
          <th scope="col">Trashed</th>
        </tr>
      </thead>
      <tbody>
        @if($tags->count()>0)
          @foreach ($tags as $tag)
          <tr scop="row">
            <td style="text-transform: capitalize;">{{ $tag->tag }}</td>
            <td>
              <a href="{{ route('tag.edit',['id'=>$tag->id]) }}" class="btn btn-info">Edit</a>
            </td>
            <td><a href="{{ route('tag.destroy',['id'=>$tag->id]) }}" class="btn btn-danger">Trash</a></td>
          </tr>
          @endforeach
        @else
          <tr>
            <th scope="col" colspan="4" class="text-center"> No Published Tags</th>
          </tr>
        @endif
      </tbody>

    </table>

  </div>

</div>
@endsection

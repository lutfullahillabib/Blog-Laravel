@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    <h2>Users</h2>
  </div>
  <div class="card-body">

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Permission</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @if($users->count()>0)
          @foreach ($users as $user)
          <tr scop="row">
            <td> <img src="{{ asset($user->profile->avatar) }}" alt="Avatar" style="width: 60px; height: 60px; border-radius: 50%;"> </td>
            <td style="text-transform: capitalize;">{{ $user->name }}</td>
            <td>
              @if($user->admin)
                <a href="{{ route('user.not.admin',['id'=> $user->id]) }}" class="btn btn-danger btn-sm">Remove Permission</a>
              @else
                <a href="{{ route('user.admin',['id'=> $user->id]) }}" class="btn btn-success btn-sm">Make Admin</a>
              @endif
            </td>
            <td>
              @if(Auth::id() !== $user->id)
              <a href="{{ route('user.destroy',['id'=>$user->id]) }}" class="btn btn-danger">Delete</a>
              @else
              <span class="btn btn-info btn-sm">Current User</span>
              @endif
            </td>
          </tr>
          @endforeach
        @else
          <tr>
            <th scope="col" colspan="4" class="text-center"> No users found</th>
          </tr>
        @endif
      </tbody>

    </table>

  </div>

</div>
@endsection

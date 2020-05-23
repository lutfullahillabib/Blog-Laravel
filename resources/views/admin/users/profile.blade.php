@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    Edit Your Profile
  </div>
  <div class="card-body">
    @include('admin.include.error')
    <form class="" action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="email">Upload New Avatar</label>
        <input type="file" name="avatar" value="" class="form-control">
      </div>

      <div class="form-group">
        <label for="name">Facebook Profile</label>
        <input type="text" name="facebook_profile" value="{{ $user->profile->facebook }}" class="form-control">
      </div>

      <div class="form-group">
        <label for="name">Youtube Chanel</label>
        <input type="text" name="youtube_chanel" value="{{ $user->profile->youtube }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="about">About You</label>
        <textarea name="about" rows="8" cols="80" class="form-control">{{ $user->profile->about }}</textarea>

      </div>
      <div class="text-center">
        <button type="submit" name="button" class="btn btn-success">Update Profile</button>
      </div>

    </form>

  </div>

</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    Update Settings
  </div>
  <div class="card-body">
    @include('admin.include.error')
    <form class="" action="{{ route('settings.update') }}" method="post">
      @csrf

      <div class="form-group">
        <label for="site_name">Site name</label>
        <input type="text" name="site_name" value="{{ $setting->site_name }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="contact_number">Contact number</label>
        <input type="text" name="contact_number" value="{{ $setting->contact_number }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="contact_email">Contact email</label>
        <input type="text" name="contact_email" value="{{ $setting->contact_email }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="address">address</label>
        <input type="text" name="address" value="{{ $setting->address }}" class="form-control">
      </div>
      <div class="text-center">
        <button type="submit" name="button" class="btn btn-success">Update Settings</button>
      </div>

    </form>

  </div>

</div>
@endsection

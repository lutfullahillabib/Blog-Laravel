@if (Session::has('success'))

<div class="py-2"><h5 class="text-success"> <strong>{{Session::get('success') }}</strong> </h6></div>

@endif

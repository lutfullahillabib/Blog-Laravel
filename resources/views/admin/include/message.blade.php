@if (Session::has('success'))
<div class="py-2"><h5 class="text-success"> <strong>{{Session::get('success') }}</strong> </h6></div>
@elseif(Session::has('info'))
<div class="py-2"><h5 class="text-info"> <strong>{{Session::get('info') }}</strong> </h6></div>

@endif

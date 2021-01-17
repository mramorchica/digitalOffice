@if(Session::has('msg_primary'))
	<p class="alert alert-primary" style="margin-top: 10px;">{{ Session::get('msg_primary') }}</p>
@endif
@if(Session::has('msg_success'))
	<p class="alert alert-success" style="margin-top: 10px;">{!! Session::get('msg_success') !!}</p>
@endif

@if(Session::has('msg_warning'))
	<p class="alert alert-warning" style="margin-top: 10px;">{{ Session::get('msg_warning') }}</p>
@endif

@if(Session::has('msg_danger'))
	<p class="alert alert-danger" style="margin-top: 10px;">{{ Session::get('msg_danger') }}</p>
@endif
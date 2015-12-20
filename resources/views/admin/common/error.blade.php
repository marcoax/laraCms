@if (Session::has('message'))
<div class="flash alert-info pf25 mb15">
	<p>
		{{ Session::get('message') }}
	</p>
</div>
@endif
@if ($errors->any())
<div class='flash alert-danger pf25 mb15'>
	@foreach ( $errors->all() as $error )
	<p>
		{{ $error }}
	</p>
	@endforeach
</div>
@endif
@if (session('status'))
<div class="alert alert-success">
	{{ session('status') }}
</div>
@endif
@if (Session::has('flash_message'))
<div class="flash alert alert-info {{ Session::has('flash_message_important') ? 'alert-important':''}} pf25 mb15">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{ session('flash_message') }}

</div>
@endif
@if (Session::has('message'))
	<div class="flash alert alert-info {{ Session::has('message_important') ? 'alert-important':''}} pf25 mb15">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ session('message') }}
	</div>
@endif
@if ($errors->any())
<div class='flash alert-danger pf25 mb15'>
	@foreach ( $errors->all() as $error )
	<p>{{ $error }}</p>
	@endforeach
</div>
@endif

@if (session('status'))
<div class="flash alert  alert-success">
	{{ session('status') }}
</div>
@endif

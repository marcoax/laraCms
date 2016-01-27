@if (Session::has('flash_notification') && session('flash_notification.message')!='' )
	@if (Session::has('flash_notification.overlay'))
		@include('flash::modal', ['modalClass' => 'flash-modal', 'title' => Session::get('flash_notification.title'), 'body' => Session::get('flash_notification.message')])
	@else
		<div class="flash text-center alert alert-{{ Session::get('flash_notification.level') }} {{ Session::has('flash_notification.important') ? 'alert-important':''}}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<i class="fa fa-check-circle-o fa-5x"></i>
			<p class="mv15">{!! Session::get('flash_notification.message') !!}</p>
		</div>
	@endif
@endif
@if ($errors->any())
	<div class='flash alert-danger alert-important pf25 mb15'>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		@foreach ( $errors->all() as $error )
			<p>{{ $error }}</p>
		@endforeach
	</div>
@endif


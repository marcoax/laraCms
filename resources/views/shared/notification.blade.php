@if (Session::has('flash_notification') && session('flash_notification.message')!='' )
	@if (Session::has('flash_notification.overlay'))
			<div id="flash-overlay-modal" class="modal fade flash-modal ">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

						<h4 class="modal-title">{!! Session::get('flash_notification.title') !!}</h4>
					</div>

					<div class="modal-body">
						<p>{!! Session::get('flash_notification.message') !!}</p>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- This is only necessary if you do Flash::overlay('...') -->
		<script>
			$('#flash-overlay-modal').modal();
		</script>
	@else
		<div class="flash alert alert-{{ Session::get('flash_notification.level') }}">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

			{!! Session::get('flash_notification.message') !!}
		</div>
	@endif
@endif
@if ($errors->any())
	<div class='flash alert-danger alert-important pf25 mb15'>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		@foreach ( $errors->all() as $error )
			{{ $error }}
		@endforeach
	</div>
@endif


<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title">
		<i class="fa fa-file-text-o"></i>
		@if( $article->title!='')
			Edit {{ $article->title }}
		@elseif( $article->name!='')
			Edit {{ $article->name }}
		@else
			Create new  {{ $pageConfig['model'] }}
		@endif
	</h4>
</div>
<div class="modal-body">
	<div id="errorBox">@include('admin.common.error')</div>
	{{ Form::model($article,['id'=>'edit_modal_form','class' =>'form-horizontal']) }}
	<fieldset>
		<div>
			{{ AdminForm::get( $article ) }}
			@if ( config('laraCms.admin.list.section.'.strtolower(str_plural($pageConfig['model'])).'s.password')  == 1)
				@include('admin.helper.password')
			@endif
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<button type="reset" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">
						<i class="fa fa-close"></i> Close
					</button>
					<button type="submit" class="btn btn-primary btn-lg pull-right pl25">
						<i class="fa fa-save"></i>  Save
					</button>
				</div>
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
</div>
<script type="text/javascript">

	$(function() {

		$('#edit_modal_form').on('submit', function (ev) {
			ev.preventDefault();
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: $(this).attr('action'),
				data: $(this).serialize(),
				success: function (response) {
					var errorsHtml = '<div class="alert alert-info"><ul>';
					errorsHtml += '<li>' + response.status + '</li>'; //showing only the first error.
					errorsHtml += '</ul></div>';
					$('#errorBox').html(errorsHtml)
				},
				error: function (data) {
					var errors = data.responseJSON;
					var errorsHtml = '<div class="alert alert-danger"><ul>';

					$.each( errors , function( key, value ) {
						errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
					});
					errorsHtml += '</ul></div>';
					$('#errorBox').html(errorsHtml);
				}
			});
		});

		$('#myModal').on('hidden.bs.modal', function () {
			$('#edit_form').submit();
		})

	});
</script>
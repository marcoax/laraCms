@extends('admin.master')
@section('title', 'Edit')
@section('content')
	@include('admin.helper.toolbar_top')
	<div class="container col-md-12 pt15">@include('shared.notification')</div>
	<div class="container col-md-8 pt5">


				{{ Form::model($article,['files' => true,'id'=>'edit_form','class' =>'form-horizontal','accept-charset' => "UTF-8"]) }}

				<fieldset>
					<div>
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active x-big">
								<a href="#main_tab" aria-controls="main_tab" role="tab" data-toggle="tab">
									<i class="fa fa-file-text-o"></i>
									@if( $article->title!='')
										Edit {{ $article->title }}
									@elseif( $article->name!='')
										Edit {{ $article->name }}
									@else
										Create new  {{ $pageConfig['model'] }}
									@endif
								</a>
							</li>
							@if ( config('admin.list.section.'.strtolower(str_plural($pageConfig['model'])).'.showSeo')  == 1)
								<li role="presentation" class="x-big">
									<a href="#seo_tab" aria-controls="seo_tab" role="tab" data-toggle="tab">
										<i class="fa fa-bolt"></i> Seo
									</a>
							</li>
							@endif
							@if ( config('admin.list.section.'.strtolower(str_plural($pageConfig['model'])).'.showMedia')  == 1 && $article->id!='')
								<li role="presentation" class="x-big">
									<a href="#media_tab" aria-controls="media_tab" role="tab" data-toggle="tab">
										<i class="fa fa-file-image-o"></i> Media
									</a>
								</li>
							@endif
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active well noborder-top bs-component " id="main_tab">

								{{ AdminForm::get( $article ) }}
								@if ( config('admin.list.section.'.strtolower(str_plural($pageConfig['model'])).'s.password')  == 1)
									@include('admin.helper.password')
								@endif

								@include('admin.helper.form_submit_button')
							</div>
							@if ( config('admin.list.section.'.strtolower(str_plural($pageConfig['model'])).'.showSeo')  == 1)
								<div role="tabpanel" class="tab-pane well noborder-top  bs-component" id="seo_tab">
									{{ AdminForm::getSeo( $article ) }}
									@include('admin.helper.form_submit_button')
								</div>
							@endif
							@if ( config('admin.list.section.'.strtolower(str_plural($pageConfig['model'])).'.showMedia')  == 1 && $article->id!='')
								<div role="tabpanel" class="tab-pane  well noborder-top bs-component" id="media_tab">
									@include('admin.helper.form_uplodifive')
									@include('admin.helper.form_submit_button')
								</div>
							@endif
						</div>
					</div>
				</fieldset>
			{{ Form::close() }}
		</div>
	</div>
	<div  class="col-sm-4 mt25 pt25">
		<div class="well well bs-component" id="naviSx" data-spy="affixd" data-offset-top="0">
			@include('admin.helper.side_bar_action')
		</div>
	</div><!--/span contenuto  box  dx-->
	<div id="info" class="hidden"></div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			</div><!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
@endsection
@section('footerjs')
	<script src="{!! asset('public/js/vendor/jquery.uploadifive.min.js')!!}" type="text/javascript"></script>
	<script type="text/javascript">

     	$(function() {
			Cms.initTinymce();
			Cms.initDatePicker();
			Cms.initUploadifive();
			Cms.initSortableList("ul#simpleGallery");
			Cms.initSortableList("ul#simpleDocGallery");

		});
	</script>
	<script>
		$('#flash-overlay-modal').modal();
	</script>
@endsection
@extends('admin.master')
@section('title', 'Admin Control Panel'.$pageConfig['title'])
@section('content')
<form>
@include('admin.helper.toolbar_top')
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
<div class="container col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading pf5">
			<h2 class="mf5 pf0"> <i class="fa fa-{!! $pageConfig['icon']!!}"></i> {!! $pageConfig['title']!!}   List </h2>
		</div>
		@include('admin.common.error')
		@if ($articles->isEmpty())
		<h3 class="pf15">
			There is no item.
		</h3>
		@else
		<div id="page-list" class="table-responsive">
			<table id="table-list" class="table table-striped table-bordered table-condensed table-hover table-shadow">
				<thead>
					<tr>
						@if ($pageConfig['selectable']==1)
							<th class="middle-vertical-align"></th>
						@endif

						@foreach($labels=explode(',',$pageConfig['fieldLabel']) as $label)
						<th class="middle-vertical-align">{!! $label !!}</th>
						@endforeach
						<th class="middle-vertical-align">{!! trans('admin.label.edit')!!}</th>
						<th class="middle-vertical-align">{!! trans('admin.label.delete')!!}</th>
					</tr>
				</thead>
				<tbody>
					@foreach($articles as $article)
					<tr id="row_{!! $article->id !!}">
						@if ($pageConfig['selectable']==1)
							<td>
								<input type="checkbox" value="{!! $article->id !!}" id="list_{!! $article->id !!}" name="list[{!! $article->id !!}]" class="checkbox"/>
              				</td>
						@endif
						@foreach($labels=$pageConfig['field'] as $label)
						<td class="{{ isset($label['class']) ? $label['class'] : 'text-center' }}">

							@if (is_array($label))

								@if ( $label['type'] == 'date' )
									{!! $article->$label['field']->format('d-m-Y') !!}
								@elseif ( $label['type'] == 'image' && $article->$label['field']!='' )
									<img src="{!!  ma_get_image_from_repository($article->$label['field']) !!}"  class="img-responsive imgEditThumb">
								@elseif ( $label['type'] == 'boolean' )

									<div class="togglebutton"  data-list-boolean ="{!! $pageConfig['model'].'_'.$article->id !!}" data-list-name ="{!! $label['field']!!}" >
											<i class=" transitioned fa fa-2x fa-check text-success pointer {{ ($article->$label['field']==1) ? '' : 'hidden' }} "></i>
											<i class="transitioned fa fa-2x fa-close text-error  pointer {{ ($article->$label['field']==1) ? 'hidden' : '' }}"></i>
									</div>


								@elseif ( $label['type'] == 'editable' )
									<input
										id="{!! $pageConfig['model'].'_'.$label['field'].'_'.$article->id !!}"
										name="{!! $label['field'] !!}[]"
										type="text" value="{{ $article->$label['field']}}"
										data-list-value ="{!! $pageConfig['model'].'_'.$article->id !!}"
										data-list-name ="{!! $label['field']!!}"
										/>
								@elseif ( $label['type'] == 'relation'  )
									@if ( $article->$label['relation']) {!! $article->$label['relation']->$label['field'] !!} @endif
								@else
									{!! $article->$label['field'] !!}

								@endif

							@else
								{!! $article->$label !!}

							@endif
						</td>
						@endforeach
						<td class="text-center"><a href="{{ URL::to('/admin/edit/'.strtolower($pageConfig['model']).'s/'.$article->id) }}" class="btn btn-primary btn-small "   data-role ="edit-item"> <i class="fa fa-edit"></i> {!! trans('admin.label.edit')!!}</a></td>
						<td class="text-center"><a href="{!! action('Admin\\'.$pageConfig['model'].'sController@destroy', $article->id) !!}"  class="btn btn-danger btn-small" data-role ="delete-item"><i class="fa fa-trash"></i> {!! trans('admin.label.delete')!!}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		@endif
		@if ($articles->render())
		<div class="panel-heading">
			<div class="pagination"> {!! $articles->render() !!} </div>
		</div>
		@endif
	</div>

</div>
</form>

@endsection
@if(isset($pageConfig['field_searcheable']))
	{!! Form::open(['id' => 'search_form','name'=>'search_form','method' => 'GET']) !!}
	<div  class="row bck-color-3 pt15 pb10 mb15 mh0 pl10">
		@foreach ($pageConfig['field_searcheable'] as $key => $search_item )
			<div class="{{ $search_item['class'] }} ph5">
				<label class="block clearfix "> {{ $search_item['label'] }}
					<span class="block">
						@if ($search_item['type'] == 'relation')
							{!! AdminForm::buildSearchableField($key, $search_item) !!}
						@elseif ($search_item['type'] == 'suggest')
							{!! AdminForm::buildSuggestableField($key, $search_item) !!}
						@else
							{!! Form::text($search_item['field'],'', array('class' => ' form-control ')) !!}
						@endif
					</span>
				</label>
			</div>
		@endforeach
		<div class="col-sm-2">
			<button type="submit" class="btn btn-primary mt15" >
				<i class="fa fa-search"></i> {{ trans('admin.label.search') }}
			</button>
		</div>
	</div>
	{!! Form::close() !!}
@endif
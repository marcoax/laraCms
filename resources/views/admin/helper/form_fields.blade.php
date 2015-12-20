@foreach($article->getFieldSpec() as $key => $property)
	@if ( $property['type'] =='string'  && $property['display']== 1)

		<div class="form-group">
			<label for="{{ $key }}" class="col-lg-2 control-label">{{ ucwords($property['label']) }}</label>
			<div class="col-md-10">
				<input type="text" class="form-control" id="{{ $key }}"  placeholder="{{ ucwords($property['label']) }}" name="{{ $key }}" value="{{ $article->$key }}">
			</div>
		</div>

	@endif
	
	@if ( $property['type'] =='integer'  && $property['display']== 1)

		<div class="form-group">
			<label for="{{ $key }}" class="col-lg-2 control-label">{{ ucwords($property['label']) }}</label>
			<div class="col-md-4">
				<input type="text" class="form-control" id="{{ $key }}"  placeholder="{{ ucwords($property['label']) }}" name="{{ $key }}" value="{{ $article->$key }}">
			</div>
		</div>

	@endif

	@if ( $property['type'] =='boolean'  && $property['display']== 1)

		<div class="form-group">
			<label for="{{ $key }}" class="col-lg-2 control-label">{{ ucwords($property['label']) }}</label>
			<div class="col-lg-10">
				{!! Form::checkbox($key, 1 , $article->$key ) !!}
			</div>
		</div>
	@endif
	@if ( $property['type'] =='text'  && $property['display']== 1)
		<div class="form-group">
			<label for="{{ $key }}" class="col-lg-2 control-label">{{ ucwords($property['label']) }}</label>
			<div class="col-lg-10">
				<textarea class="form-control" rows="3" id="{{ $key }}"  name="{{ $key }}" >{!! $article->$key !!}</textarea>
			</div>
		</div>
	@endif
	
	@if ( $property['type'] =='media'  && $property['display']== 1)
		<div class="form-group">
			<label for="{{ $key }}" class="col-lg-2 control-label">{{ ucwords($property['label']) }}
				({!! $article->key !!})
			</label>
		
			<div class="col-lg-10">
				
				{!! Form::file($article->$key) !!}
			</div>
		</div>
	@endif
	@if ( $property['type'] =='password'  && $property['display']== 1)
		@include('admin.helper.password')
	@endif
@endforeach
{{ Form::open(array('id' => 'form-newsletter','name' => 'form-newsletter','class'=>'form-inline')) }}
	<div class="form-group">
		<label for="email" class="control-label">Newsletter </label>
		<div class="input-group btn-full" >

			<input type="text" class="form-control"
				   id="email"
				   name="email" type="text" placeholder="Email">

		</div>
	</div><button id="btn-newsletter-subscribe" class="btn btn-newslwtter btn-full" type="button">Iscriviti</button>

	<div class="small text-right padding-top-5"><a href ="">* Leggi l'informativa sulla privacy</a></div>
{{ Form::close() }}


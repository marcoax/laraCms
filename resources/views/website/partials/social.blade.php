@inject('social','App\Social')
	<div class="container-full bck-color-main">
		<ul class="socialIcons list-inline  text-center back-color-main mb0 pf15">
		@foreach ( $social->all() as $error )
			<li class="xx-big">
				<a href="{{ $error->link }}" target="_new">
					<span class="fa-stack fa-lg transitioned">
					  <i class="fa fa-circle fa-stack-2x color-6 transitioned"></i>
					  <i class="fa {{ $error->icon }} fa-stack-1x fa-inverse color-2 transitioned"></i>
					</span>
				</a>
			</li>
		@endforeach
	</ul>
</div>
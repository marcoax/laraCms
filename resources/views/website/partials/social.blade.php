
@inject('social','App\Social')
<div class="container-full bck-color-main">
	<ul class="socialIcons list-inline  text-center back-color-main mb0 pf15">
		{!! HtmlSocial::get()->render() !!}
	</ul>
</div>
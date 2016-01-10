@unless($news->tags->isEmpty())
	<hr class="mb5 pb5"/>
	<ul class="list-inline  back-color-main mb0">
		<li>Tags:</li>
	@foreach ( $news->tags as $item )
		<li class="mf0 pr5">
			<a href="{{ $item->slug }}" target="_new">{{ $item->title }} </a>
		</li>
	@endforeach
	</ul>
@endunless
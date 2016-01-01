<ul id="filters" class="unstyled list-inline">
    <li><button id="all-isotope" class="btn btn-default btn-full mb5 active " data-filter="*">ALL</button></li>
    @foreach (  $article->children($article->id)->get()  as  $index => $item )
        <li><button class="btn btn-default mb5 " data-filter=".{{$item->title }}">{{$item->title }}</button></li>
    @endforeach
</ul>
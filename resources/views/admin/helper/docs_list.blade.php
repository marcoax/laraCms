<ul class="thumbnails ui-sortable mf0" id="simpleDocGallery">
    @forelse($article->media->where('collection_name','docs','=')->all() as $media)
        <li id="box_media_{!! $media->id!!}" class="thumbnail pf10 mb14">

            <div class="pull-right">
                <a href="#" data-toggle="modal">{!! trans('admin.label.edit')!!}</a> -
                <a href=" {!!   ma_get_doc_from_repository($media->file_name) !!}" class="red" target="_new">{!! trans('admin.label.view')!!}</a> -
                <a href="#" class="red" onclick="deleteItem(this);return false" id="delete_media_{!! $media->id!!}">{!! trans('admin.label.delete')!!}</a>
            </div>
            <div id="item_media_{!! $media->id!!}_text" class="caption pull-left">{!! $media->title!!}</div>
        </li>
    @empty
        {!! trans('admin.message.no_item_found')!!}
    @endforelse
</ul>


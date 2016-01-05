<ul class="thumbnails list-unstyled ui-sortable" id="simpleGallery">
    @forelse($article->media->where('collection_name','images','=')->all() as $media)
        <li id="box_media_{!! $media->id!!}" class="thumbnail mf10 pf10">
            <div id="item_media_{!! $media->id!!}_text" class="caption">{!! $media->title!!}</div>
            <img src="{!!  ma_get_image_from_repository($media->file_name) !!}" alt="{!! $media->title!!}" border="0">
            <a href="#" data-toggle="modal">{!! trans('admin.label.edit')!!}</a> -
            <a href=" {!!   ma_get_image_from_repository($media->file_name) !!}" class="red" target="_new">{!! trans('admin.label.view')!!}</a> -
            <a href="#" class="red" onclick="deleteItem(this);return false" id="delete_media_{!! $media->id!!}">{!! trans('admin.label.delete')!!}</a>
        </li>
    @empty
        {!! trans('admin.message.no_item_found')!!}
    @endforelse
</ul>

<ul class="thumbnails list-unstyled ui-sortable" id="simpleGallery">

        @forelse($article->media->where('collection_name','images')->all() as $media)

        <li id="box_media_{!! $media->id!!}" class="thumbnail mf10 pf10">
            <div id="item_media_{!! $media->id!!}_text" class="caption text-center">
                @if( $media->media_category_id > 0 ){!! $media->media_category->title !!}<br> @endif
                @if( $media->title !=  $media->file_name)
                    {!! $media->title!!}
                @endif
            </div>
            <img src="{!! ma_get_image_on_the_fly_cached($media->file_name,120,90,'jpg') !!}" alt="{!! $media->title!!}" border="0">
            <a href="{{  ma_get_admin_editmodal_url($media) }}" data-toggle="modal"    data-target="#myModal">{!! trans('admin.label.edit')!!}</a> -
            <a href=" {!!   ma_get_image_from_repository($media->file_name) !!}"  target="_new">{!! trans('admin.label.view')!!}</a> -
            <a href="#" onclick="deleteItem(this);return false" id="delete_media_{!! $media->id!!}">{!! trans('admin.label.delete')!!}</a>
        </li>

        @empty
            {!! trans('admin.message.no_item_found')!!}
        @endforelse

</ul>

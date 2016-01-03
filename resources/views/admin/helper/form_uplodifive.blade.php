<div class="col-md-12">
    <div class="form-group">
        <h5>{!! trans('admin.message.media_max_file') !!}</h5>
        <label>{!!trans('admin.message.media_doc_type') !!}</label>
        <select id="myImgType" name="myImgType" class="form-control mid-input full-xs">
            <option value=''>{!! trans('admin.label.please_select')!!}</option>
             <option value="40">Page Gallery</option>
            <option value="39">Top Slider Image</option>
        </select>
        <input id="itemId" name="itemId" type="hidden" value="{!! $article->id!!}">
    </div>
</div>
<hr/>
<fieldset class="alert alert-info">
    <input id="file_upload" name="file_upload" type="file" multiple="true" class="btn btn-primary">

    <div>
        <div id="queue">{!!trans('admin.message.media_drag') !!}</div>
    </div>
</fieldset>
<a href="javascript:$('#file_upload').uploadifive('upload')" class="btn btn-primary hidden"> <i class="fa fa-download"></i> {!! trans('admin.label.upload_file')!!}</a>
<hr/>
<h3 class="separatore"></h3>
<div id="imageList">
    <h3>{!!trans('admin.message.media_image_gallery') !!}</h3>
    <div id="imageListBody" class="pf0 mf0">
        <ul class="thumbnails ui-sortable" id="simpleGallery">
            @forelse($article->medias->where('collection_name','images','=')->all() as $media)
                <li id="item_media_{!! $media->id!!}" class="thumbnail mf10 pf10">
                    <div id="item_media_{!! $media->id!!}_text" class="caption">{!! $media->title!!}</div>
                    <img src="{!!  ma_get_image_from_media_repository($media->file_name) !!}" alt="{!! $media->title!!}" border="0">
                    <a href="modalEdit.php?mode=edit&amp;Id_sez=documenti&amp;Id_sub=immagini&amp;modal=1&amp;Id=42" data-toggle="modal">Edit</a> -
                    <a href=" {!!   ma_get_image_from_media_repository($media->file_name) !!}" class="red" target="_new">View</a> -
                    <a href="#" class="red" onclick="deleteItem(this);return false" id="delete_media_{!! $media->id!!}">Delete</a>
                </li>
            @empty
                {!! trans('admin.message.no_item_found')!!}
            @endforelse
        </ul>
</div>
</div>
<div id="docList">
<h3>{!!trans('admin.message.media_doc_gallery') !!}</h3>
<div id="docListBody" class="pf0 mf0">
    <ul class="thumbnails ui-sortable mf0" id="simpleDocGallery">
    @forelse($article->medias->where('collection_name','docs','=')->all() as $media)
            <li id="item_media_{!! $media->id!!}" class="thumbnail pf10 mb14">

                <div class="pull-right">
                <a href="modalEdit.php?mode=edit&amp;Id_sez=documenti&amp;Id_sub=immagini&amp;modal=1&amp;Id=42" data-toggle="modal">Edit</a> -
                <a href=" {!!   ma_get_doc_from_repository($media->file_name) !!}" class="red" target="_new">View</a> -
                <a href="#" class="red" onclick="deleteItem(this);return false" id="delete_media_{!! $media->id!!}Fass">Delete</a>
                </div>
                <div id="item_media_{!! $media->id!!}_text" class="caption pull-left">{!! $media->title!!}</div>
            </li>
    @empty
        {!! trans('admin.message.no_item_found')!!}
    @endforelse
    </ul>
</div>
</div>
<hr/>


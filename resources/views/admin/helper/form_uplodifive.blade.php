<div class="col-md-12">
    <div class="form-group">
        <h5>{!! trans('admin.message.media_max_file') !!}</h5>
        <label>{!!trans('admin.message.media_doc_type') !!}</label>
        <select id="myImgType" name="myImgType" class="form-control mid-input full-xs">
            <option value=''>{!! trans('admin.label.please_select')!!}</option>
            <option value="1">Page Gallery</option>
            <option value="2">Top Slider Image</option>
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
<a href="javascript:$('#file_upload').uploadifive('upload')" class="btn btn-primary hidden"> <i
            class="fa fa-download"></i> {!! trans('admin.label.upload_file')!!}</a>
<hr/>
<h3 class="separatore"></h3>
<div id="imagesList">
    <h3>{!!trans('admin.message.media_image_gallery') !!}</h3>
    <div id="imagesListBody" class="pf0 mf0">
        @include('admin.helper.images_list_gallery')
    </div>
</div>
<div id="docsList">
    <h3>{!!trans('admin.message.media_doc_gallery') !!}</h3>
    <div id="docsListBody" class="pf0 mf0">
        @include('admin.helper.docs_list')
    </div>
</div>
<hr/>


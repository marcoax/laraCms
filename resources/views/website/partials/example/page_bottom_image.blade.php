<?php $bottomImages = $article->media()->gallery(config('laraCms.website.option.images.bottom'))->get();?>
@if( $bottomImages !='')
    <div class="mv35 wow animated fadeInUp" data-wow-delay="500ms" style="visibility: hidden;">
        @foreach ( $bottomImages as  $index => $images )
        <img src="{!! ma_get_image_from_repository( $images->file_name) !!}" alt="{!! $images->file_name  !!}"  class="img-responsive" >
        @endforeach
    </div>
@endif



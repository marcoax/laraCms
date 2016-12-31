<?php $owlImages = $article->media()->gallery(config('laraCms.website.option.images.gallery'))->get();?>
@if( $owlImages !='')
    <!-- BLOCK 2 -->
    <!--=== Slider ===-->
    <div class="gallery-world mv35 wow animated fadeInUp" data-wow-delay="250ms" style="visibility: hidden;">
        @foreach ( $owlImages as  $index => $slider )
            <div class="item">
                <a href="{!! ma_get_image_from_repository( $slider->file_name) !!}" class="lightbox">

                <img src="{!!  ma_get_image_on_the_fly_cached($slider->file_name,373,363  ,'jpg') !!}" alt="{!! $slider->file_name  !!}"  class="img-responsive" >
                </a>
            </div>
        @endforeach
    </div>
    <!--=== End Slider ===-->
@endif



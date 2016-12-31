<?php $owlImages = $article->media()->gallery(1)->get();?>
@if( $owlImages !='')
    <!--=== Slider ===-->
    <div class="gallery-about mv35-xs mv100-min-xs wow animated fadeInUp">
        @foreach ( $owlImages as  $index => $slider )
            <div class="item">
                <a href="{!! ma_get_image_from_repository( $slider->file_name) !!}" class="lightbox">
                <img src="{!! ma_get_image_from_repository( $slider->file_name) !!}" alt="{!! $slider->file_name  !!}"  class="img-responsive" >
                </a>
            </div>
        @endforeach
    </div>
    <!--=== End Slider ===-->
@endif


        <!-- BLOCK 2 -->



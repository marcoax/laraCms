<?php $galleryImages = $article->media()->gallery(2)->get();?>
@if( $galleryImages !='')

    <!--=== Slider ===-->
        <div id="carousel-about" class="carousel slide wow animated fadeInUp" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach ( $galleryImages as  $index => $slider )
                <div class="item @if ($index == 0) active  @endif">
                    <img src="{!! ma_get_image_from_repository( $slider->file_name) !!}" alt="{!! $slider->file_name  !!}" class="img-responsive fw">
                </div>
                @endforeach

            </div>

            <div class="container">
                <div class="text pv15 ph35-min-xs">
                    <h2 class="title text-300 mt0 mb10">{!! $article->abstract !!}</h2>
                    <ol class="carousel-indicators">
                        @foreach ( $galleryImages as  $index => $slider )
                            <li data-target="#carousel-about" data-slide-to="{!! $index !!}" class="@if ($index == 0) active  @endif"></li>
                        @endforeach
                   </ol>
                </div>
            </div>
       </div>
    <!--=== End Slider ===-->

@endif

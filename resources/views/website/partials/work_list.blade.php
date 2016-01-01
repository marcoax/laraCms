
    @foreach (  $article->children($article->id)->get()  as  $index => $category )
        @foreach (  $category->children($category->id)->get()  as  $index => $item )
        <div class="col-sm-6 col-md-4 col-lg-4 mb20 topa {{$category->slug }}">
            <div class="thumbnail product-gallery  ">
                <div class="box-image">
                    <a href="{!!  ma_get_image_from_repository($item->image) !!} "
                       class="fancybox-button zoomer" data-rel="fancybox-button" title="{{$item->title }}">
                        <span class="overlay-zoom"><img src="{!!  ma_get_image_from_repository($item->image) !!}" alt="{{$item->title }}" border="0" class="img-responsive-100">
                            <span class="zoom-icon"><i class="fa fa-search-plus fa-4x color-6 fa-rotate-90"></i></span>
                        </span>
                    </a>
                </div>
                <div class="caption">
                    <h4 class="color-4 mv10 text-uppercase">{{$category->title }}</h4>
                    <h2 class="color-main mb10">{{$item->title }}</h2>
                    {!! $item->description  !!}
                </div>
            </div>
        </div>
        <?php
        $img = Image::make(file_get_contents('http://www.creolo.org//public//progetti_tj13_thumb.jpg' ));
        $img->encode('png');
        $type = 'png';
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($img);
        ?>
        <img src="{!! $base64 !!}">
        @endforeach
    @endforeach

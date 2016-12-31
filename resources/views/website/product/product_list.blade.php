
@foreach (  $product_category->where('pub',1)->orderby('sort')->get()  as  $index => $category )
    @foreach (  $category->product()->where('pub',1)->orderby('sort')->get()  as  $index => $item )
        <div class="col-sm-6 col-md-4 col-lg-4 mb20 topa {{$category->slug }}">
            <div class="thumbnail product-gallery  ">
                <div class="box-image">
                    <a href="{!!  ma_get_image_from_repository($item->image) !!} "
                       class="lightbox zoomer"
                       data-rel="lightbox"
                       title="{{$item->title }}">
                      <span class="overlay-zoom">
                          <img src="{!! ImgHelper::get($item->image, config('laraCms.image.thumbnail')) !!}" alt="{{ $item->title }}" border="0" class="img-responsive 100">
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
   @endforeach
@endforeach

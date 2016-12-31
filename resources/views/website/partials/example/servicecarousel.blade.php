<!--=== Content Part SERVIZI ===-->
<section data-role="servizi-carousel">
    <div  class="bck-color-6 pt5 pb25">
        <div class="container content bck-color-6">
            <div class="row">
                <div class="col-sm-12 text-center ">
                    <h1 class="color-4 mv20 wow bounceInRight smally">{{ $services->subtitle }}</h1>
                    <h2 class=" mt5 mb15 text-uppercase color-main wow bounceInLeft">{{ $services->title }}</h2>
                </div>
                <div class="col-sm-12 text-center">
                    {!! $services->description !!}
                </div>

                <div class="col-sm-12 text-center mv15 ">
                    <span class="color-4 xx-big customPrevBtnServizi cursor-pointer glyphicon glyphicon-chevron-left"></span> <span class="color-4 xx-big customNextBtnServizi cursor-pointer glyphicon glyphicon-chevron-right"></span>
                </div>
                <div class="col-xs-12">
                    <div  class="servizi-carousel owl-carousel owl-theme">
                        @foreach (  $services->children($services->id)->get()  as  $index => $service )
                            <div class="item item-badge">
                                <div class="thumbnail servizi-gallery relative sborder-bottom-color-4-big">
                                    <div class="box-badge">
                                        <img src="{!!  ma_get_image_from_repository($service->image) !!}" alt="{{$service->title }}" class="img-responsive center-block" style="width:80px;">
                                    </div>
                                    <div class="caption">
                                        <h2 class="color-main mb10 text-center">{{$service->title }}</h2>
                                    </div>
                                    <div class="bar"></div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div><!-- row -->
        </div> <!-- /container -->
    </div>
</section>
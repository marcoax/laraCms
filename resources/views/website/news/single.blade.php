@extends('website.app')
@section('content')
@include('website.partials.page_banner')
<!--=== Content Part ===-->
<section id="news_section" class="section" data-role="home-news">
    <div class="container content pv25 mt10">
        <div class="row" id="widgets_news_homes">
            @include('website.news.news_sidebar')
            <div class="col-md-9">
                <div class="row">
                    <div class="col-sm-12 mb25">
                        <img src="{!!  ma_get_image_from_repository($news->image) !!}"
                             alt="{{ $news->title }}" border="0" class="img-responsive-100">
                    </div>
                    <div class="col-sm-12">
                        <h5 class="color-4 wow bounceInRight smally"><i class="fa fa-calendar"></i> {{ $news->date }}</h5>
                        <h1 class=" mt5 mv15 text-uppercase color-2 wow bounceInLeft">{{ $news->title }}</h1>
                        {!! $news->description !!}
                        @if ($news->link!='')
                            <div class="border-top-main pt15">
                            <a href="{!! $news->link !!}" target="_blank" class="big color-3"><i class="fa fa-link fa-1x"></i> {!! trans('website.go_to_site')!!} </a>
                            </div>
                        @endif
                        @include('website.partials.tag')

                        @include('website.news.news_share')




                        @foreach (  $news->media->where('collection_name','images','=')->all() as $media)
                            <div class="media mb15 pb15 border-bottom-color-5">

                                <div class="media-left">
                                    <img class="media-object" alt="{{ $media->title }}" src="{!! ma_get_image_on_the_fly_cached($media->file_name,200,150,'jpg') !!}" border="0" width="200" heigth="150">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading color-4 small">{{ $media->title }}</h4>
                                </div>
                            </div>

                        @endforeach
                    </div>

                </div>
            </div> <!-- / newscontainer -->
        </div>
    </div> <!-- /container -->
</section>
@endsection
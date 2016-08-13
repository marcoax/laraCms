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
                    @foreach (  $news as  $index => $post )
                        <div class="col-md-6 mb25">
                            <div >
                                <div class="mediaholder">
                                    <a href="news/{{ $post->slug }}">
                                    <img src="{!! ma_get_image_on_the_fly_cached($post->image,720,500  ,'jpg') !!}"
                                         alt="{{ $post->title }}" border="0" class="img-responsive-100">
                                    </a>
                                </div>
                                <div class="mv5">
                                    <span class="color-4">{{ $post->date }}</span>
                                </div>
                                <div class="media-body">
                                    <h4 class="mv5 color-main"> {{ $post->title }}</h4>
                                    <div>{!! $post->description !!}</div>
                                </div>
                            </div>
                        </div><!--/news -->
                    @endforeach

                </div>
            </div> <!-- / newscontainer -->
        </div>
    </div> <!-- /container -->
</section>
@endsection
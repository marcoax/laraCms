<!--=== news side bar ===-->
@inject('posts','App\News')
<div class="col-md-3 mb25-max-sm">
    <h3 class="color-4  mb15">{{ $article->title }}</h3>
    <div class="text-left wow flipInY animated  animated">
        <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( $article->slug )) }}"><h2 class="color-main mb25 txt-upper text-extra-spaced-mid">{{ $article->subtitle }}</h2></a>
    </div>
    @foreach (  $posts->Latest(3)->get() as  $index => $posta )
        <div class="media mb15 pb15 border-bottom-color-5">
            <div class="media-left">
                <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( $article->slug.'/'.$posta->slug )) }}">
                    <img class="media-object"  src="{!!  ma_get_image_from_repository($posta->image) !!}" border="0" width="64" heigth="64">
                </a>

            </div>
            <div class="media-body">
                <h6 class="media-heading color-2 smallTitle">{{ $posta->date }}</h6>
                <h4 class="media-heading color-4 small">{{ $posta->title }}</h4>

            </div>
        </div>

    @endforeach
</div> <!-- / newsheader -->
<div id="news-sharer">
    <div class="share-links">
        <span class="mr5">{!! trans('website.news.share_on') !!}</span>
        <a class="facebook" href="http://www.facebook.com/sharer.php?u={!! LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( $news->slug )) !!}" title="Facebook" target="_blank">
            <i class="fa fa-facebook bck-color-2"></i></a>
        <a class="google-plus" href="https://plus.google.com/share?url={!! LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( $news->slug )) !!}" title="Google Plus" target="_blank">
            <i class="fa fa-google-plus bck-color-2"></i></a>
        <a class="invia-ad-un-amico" href="mailto:?subject={!! $news->title !!}&body={!! LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( $news->slug )) !!}" title="Email" target="_blank">
            <i class="fa fa-envelope bck-color-2"></i></a>
    </div>
</div>

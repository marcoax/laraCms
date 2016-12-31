<!-- CONTENT BLOCK 3 -->
<div class="container mv35-xs mv100-min-xs wow animated fadeInUp">
    @if($page->image)
        <div class="col-md-5">
            <h3 class="title text-700 mt10 mb25">{!! $page->subtitle !!}</h3>
            {!! $page->description !!}
        </div>
        <div class="col-md-7">
            <img src="{!! asset('/website/images/about-us/cura-capelli-e-ambiente.jpg')!!}" class="img-responsive" alt="Gamma Più si è messa in testa">
        </div>
    @else

    <div class="col-md-8">
        <h3 class="title text-700 mt10 mb25">{!! $page->subtitle !!}</h3>
        {!! $page->description !!}
    </div>
    @endif
</div>

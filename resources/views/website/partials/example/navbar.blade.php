@inject('category','App\Category')
<!-- menu -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar top-bar"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <a class="navbar-brand" href="/">
            <img src="{!! asset('/website/images/logo.png')!!}">
        </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">

        <ul class="nav navbar-nav navbar-right uppercase mt53-lg mr25-min-md">
            @foreach (  $pages->top()->get() as  $index => $page )
                    <?php $children = $page->childrenMenu($page->id)->get();?>
                    @if('products' == $page->slug)
                        <li class="dropdown static {{ ($article->id == $page->id || $article->id_parent == $page->id )?'active':'' }}" id="nav_{{ $page->slug }}">
                            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( $page->slug )) }}"
                               class="{{ ($article->id == $page->id)?'active':'' }} dropdown-toggle"
                               id="{{ $page->slug }}"
                               data-toggle="dropdown"
                               role="button" aria-haspopup="true" aria-expanded="false">{{ $page->title }}</a>

                            <div class="dropdown-menu dp-prodotti wow animated fadeIn">
                                <div class="text-center">
                                    <div class="row mf0">
                                        @foreach (  $category->menu()->get() as  $index => $cat )
                                            <div class="col-md-3 col-xs-6 pf0">
                                                <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( "products/".$cat->slug )) }}" class="block">
                                                    <img src="{!!  ma_get_image_from_repository($cat->banner)!!}" class="img-responsive fw" alt="{!! $cat->title !!}">
                                                    <h5 class="pt10 pr10 pl10 text-600">{!! $cat->title !!}</h5>
                                                </a>
                                            </div>
                                        @endforeach
                                        <div class="col-md-12 col-xs-12 pf0">
                                            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( "products" )) }}" class="block">
                                                 <h5 class="pt10 pr10 pl10 text-600">{{ trans('website.pagetitle.allproducts') }}</h5>
                                            </a>
                                        </div>
                                        <a id="close"><i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @elseif($children->count()>0)
                            <li  class="{{ ($article->id == $page->id || $article->id_parent == $page->id )?'active':'' }}" id="nav_{{ $page->slug }}" class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $page->title }} <span class="caret"></span></a>
                                <ul class="dropdown-menu dp-language">
                                    @foreach (  $children as  $index => $child )
                                    <li>
                                        @if($child->link!='')
                                            <a href="{{ $child->link }}"  class="{{ ($child->id == $article->id)?'active':'' }}" target="_new"> {{ $child->title }} </a>
                                        @else
                                            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( $child->slug )) }}"  class="{{ ($child->id == $article->id)?'active':'' }}"> {{ $child->title }} </a>

                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </li>

                    @else
                        <li class="{{ ($article->id == $page->id)?'active':'' }}" id="nav_{{ $page->slug }}">
                            @if ('home' == $page->slug)
                                <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( '' ) ) }}">  {{ $page->title }} </a>
                            @else
                                <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( $page->slug )) }}" > {{ $page->title }} </a>
                            @endif
                        </li>
                   @endif


            @endforeach



            <li class="dropdown">
                <a href="#" class="dropdown-toggle language" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{LaravelLocalization::getCurrentLocale()}}</a>
                <div class="dropdown-menu dp-language">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        @if (LaravelLocalization::getCurrentLocale() !=  $localeCode)
                            <a href="{{LaravelLocalization::getLocalizedURL($localeCode) }}" class="block" alt="{{ $properties['native'] }}" >{{ $properties['native'] }} </a>
                        @endif
                    @endforeach
                </div>
            </li>
        </ul>
    </div>
</nav>

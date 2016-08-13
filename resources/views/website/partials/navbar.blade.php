<!-- header -->

<div class="wrapper">
    <!--=== Header ===-->
    <header>
        <div class="header">
            <!-- Navbar -->

            <div id="main-navi" class="navbar navbar-default navbar-fixed-top transitioned" role="navigation">
                <!-- Topbar -->
                <!-- End Topbar -->
                <div id="main-nav-bar" class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-responsive-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="fa fa-bars xx-big color-2 "></span>
                        </button>
                        <a class="navbar-brand pr25-min-md" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( '' )) }}">
                            <img class="visible-xs visible-sm" id="logo-header"
                                 src="{!! asset('public/website/images/logo_header_mobile.png') !!}"
                                 alt="laraCms - design studio - Milan Italy">
                            <img id="logo-colore" class="hidden-xs hidden-sm"
                                 src="{!! asset('public/website/images/logo_colore.png') !!}"
                                 alt="laraCms - design studio - Milan Italy">
                            <img class="hidden-xs hidden-sm transitioned" id="logo-bianco"
                                 src="{!! asset('public/website/images/logo_bianco.png') !!}"
                                 alt="laraCm - design studio - Milan Italy">
                        </a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->

                    <div id="nav-main" class="collapse navbar-collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="{{url('')}} " class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false">Lang <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li>
                                            @if (LaravelLocalization::getCurrentLocale() ==  $localeCode)
                                                <a href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">{{ $properties['native'] }}</a>
                                            @else
                                                <a href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">{{ $properties['native'] }}</a>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <ul id="menu" class="nav navbar-nav nav navbar-right">
                            @foreach (  $pages->top()->get() as  $index => $page )
                                <li class="{{ ( ! empty($article) && $article->id == $page->id)?'active':'' }}" id="{{ $page->slug }}">
                                    @if ('home' == $page->slug)
                                        <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( '' ) ) }}">
                                    @else
                                        <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( $page->slug )) }}">
                                    @endif
                                    {{ $page->title }}
                                     </a>
                                </li>
                                @endforeach
                                @if (!Auth::guard()->check())
                                    <li><a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'users/login' ) ) }}">Login</a></li>
                                @else
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            {{Auth::guard()->user()->name}}
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'users/dashboard' ) ) }}"><i class="fa fa-list"></i> Dashboard</a>
                                            </li>

                                            <li class="divider"></li>
                                            <li class="dropdown">
                                                <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'users/profile' ) ) }}"><i class="fa fa-user"></i> Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'users/logout' ) ) }}"> <i class="fa fa-sign-out"></i> Logout</a>
                                            </li>
                                        </ul>
                                    </li>

                                 @endif
                                <!-- Search Block -->
                            <li class="hidden">
                                <i class="search fa fa-search search-btn"></i>
                                <div class="search-open">
                                    <div class="input-group animated fadeInDown">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <span class="input-group-btn">
							                <button class="btn-u" type="button">Go</button>
						                </span>
                                    </div>
                                </div>
                            </li>
                            <!-- End Search Block -->
                        </ul>
                    </div><!--/navbar-collapse-->
                </div>
            </div>
            <!-- End Navbar -->
        </div>
    </header>
    <!--=== End Header === -->
</div>
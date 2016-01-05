<nav class="navbar navbar-inverse navbar-fixed-top bottomonly-shadow">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ LaravelLocalization::getLocalizedURL( LaravelLocalization::getCurrentLocale() , url('')) }}">
                <img src="{!! asset('public/cms/image/logo.png')!!}" alt="CMS Login" style="height:50px;">
            </a>
        </div>

        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown hidden">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Lang
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                @if (LaravelLocalization::getCurrentLocale() ==  $localeCode)
                                    <a rel="alternate" hreflang="{{$localeCode}}"
                                       href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">{{{ $properties['native'] }}} </a>
                                @else
                                    <a rel="alternate" hreflang="{{$localeCode}}"
                                       href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">{{{ $properties['native'] }}} </a>

                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
                @if (Auth::check())
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            @if (Auth::check())
                                <li>
                                    <a href="{{ URL::to('/users/logout') }}">Logout</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/admin/edit/users/'.Auth::user()->id) }}">Profile</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ URL::to('/users/login') }}">Login</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
            @if (Auth::check())
                <ul class="nav navbar-nav navbar">
                    <li class="active">
                        <a href="{{ URL::to('/admin/') }}">DashBoard</a>
                    </li>
                    @foreach(config('admin.list.section') as $section)
                        @if ( isset($section['menu']['top-bar']['show']) )
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $section['title'] }}
                                    <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ ma_get_admin_list_url($section['model']) }}"><i class="fa fa-list"></i> {{ $section['title'] }}</a>
                                    </li>
                                    @if ( isset($section['menu']['top-bar']['action']) )
                                        @foreach($section['menu']['top-bar']['action'] as $action )
                                            @if ( $action == "add" )
                                                <li>
                                                    <a href="{{  ma_get_admin_create_url($section['model']) }}"><i class="fa fa-plus"></i> Add {{ $section['title'] }}</a>
                                                </li>
                                            @elseif ( $action == "website" )
                                                <li>
                                                    <a href="{{ URL::to('') }}" class="color-2" target="_new"><i class="fa fa-globe"></i> View site </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        @endif
                    @endforeach

                    @if (Auth::user()->hasRole('su'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Roles
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ ma_get_admin_list_url('roles') }}"><i class="fa fa-list"></i> Roles</a>
                                </li>
                                <li>
                                    <a href="{{ ma_get_admin_create_url('roles') }}"><i class="fa fa-plus"></i> Add Role</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown">
                                    <a href="{{ ma_get_admin_list_url('users') }}"><i class="fa fa-list"></i> Users</a>
                                </li>
                                <li>
                                    <a href="{{  ma_get_admin_create_url('users') }}"><i class="fa fa-plus"></i> Add User</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                 </ul>
            @endif
        </div>
    </div>
</nav>

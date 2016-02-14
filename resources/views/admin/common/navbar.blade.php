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
            <a class="navbar-brand"
               href="{{ LaravelLocalization::getLocalizedURL( LaravelLocalization::getCurrentLocale() , url('')) }}">
                <img src="{!! asset('public/cms/image/logo.png')!!}" alt="CMS Login" style="height:50px;">
            </a>
        </div>

        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                 @if (Auth::guard('admin')->check())

                    @if (Auth::guard('admin')->user()->hasRole('su'))
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tools
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown">
                                    <a href="{{ ma_get_admin_list_url('adminusers') }}"><i class="fa fa-list"></i> Admin</a>
                                </li>
                                <li>
                                    <a href="{{  ma_get_admin_create_url('adminusers') }}"><i class="fa fa-plus"></i> Add Admin</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ ma_get_admin_list_url('roles') }}"><i class="fa fa-list"></i> Roles</a>
                                </li>
                                <li>
                                    <a href="{{ ma_get_admin_create_url('roles') }}"><i class="fa fa-plus"></i> Add Role</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"  aria-expanded="false">{{Auth::guard('admin')->user()->name}} <span class="caret"></span></a>

                        <ul class="dropdown-menu" role="menu">
                            @if (Auth::guard('admin')->check())
                                <li>
                                    <a href="{{ URL::to('/admin/logout') }}">Logout</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('/admin/edit/adminusers/'.Auth::guard('admin')->user()->id) }}">Profile</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ URL::to('/admin/login') }}">Login</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
            @if (Auth::guard('admin')->check())
                <ul class="nav navbar-nav navbar">
                    <li class="active">
                        <a href="{{ URL::to('/admin/') }}">DashBoard</a>
                    </li>
                    @foreach(config('laraCms.admin.list.section') as $section)
                        @if ( isset($section['menu']['top-bar']['show']) )
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $section['title'] }}
                                    <span class="caret"></span>
                                </a>
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
                </ul>
            @endif
        </div>
    </div>
</nav>

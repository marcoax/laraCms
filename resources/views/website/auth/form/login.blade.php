<form class="form-horizontal" method="post">
    <div class="form-group mt25">
        <div class="col-md-4 col-md-offset-4">
            @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach
        </div>
    </div>
    {!! csrf_field() !!}
    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <label class="control-label">E-Mail </label>
            <input type="email" class="form-control" name="email" value="userslaracms@gmail.com">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 col-lg-offset-4">
            <label class="control-label">Password </label>
            <input type="password"  class="form-control" name="password" value="" autocomplete="off">

        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember">
                    {{ trans('message.remember_me') }}
                </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-default active btn-block mb15" style="margin-right: 15px;">
                Login
            </button>
            <a class="pull-right" href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( '/register' ) ) }}">{{ trans('message.new_user') }} </a>
            <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( '/password/reset' ) ) }}">{{ trans('message.password_forgot_your') }} </a>


        </div>
    </div>
</form>
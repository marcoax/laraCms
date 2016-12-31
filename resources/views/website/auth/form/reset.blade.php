<div class="col-md-6 col-md-offset-3  wow bounceInLeft">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>{{ trans('message.password_reset') }}</h3>
        </div>
        <div class="panel-body">
            @include('admin.common.error')
            <form class="form-horizontal" role="form" method="POST" action="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( '/password/reset' )) }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <label class="control-label"> {{ trans('website.email') }}</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="off">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <label class="control-label">Password </label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <label class="control-label">{{ trans('message.password_confirm') }}</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-default active btn-block mb15">{{ trans('message.password_reset') }} </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-6 col-md-offset-3  wow bounceInLeft">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>{{ trans('message.register_account') }}</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post">
                {!! csrf_field() !!}
                @include('admin.common.error')
                <div class="form-group ">
                    <label for="name" class="col-lg-2 control-label">{{ trans('website.name') }}</label>
                    <div class="col-lg-10">
                        <input type="text"
                               class="form-control"
                               id="name"
                               placeholder="{{ trans('website.name') }}"
                               name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                        <input type="email"
                               class="form-control"
                               id="email"
                               placeholder="Email"
                               name="email" value="{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control"  name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-lg-2 control-label">{{ trans('message.password_confirm') }}</label>
                    <div class="col-lg-10">
                        <input type="password" class="form-control"  name="password_confirmation">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-12 text-right">
                        <button type="submit" class="btn btn-primary btn-xs-full">
                            {{ trans('message.register') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
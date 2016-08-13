<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-default wow bounceInRight">
        <div class="panel-heading">
            <h3>{{ trans('message.password_forgot') }}</h3>
        </div>
        <div class="panel-body pv25">
            @include('admin.common.error')
            <form class="form-horizontal" role="form" method="POST" >
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <label class="control-label">E-Mail</label>
                        <input type="email" class="form-control" name="email" value="userslaracms@gmail.com{{ old('email') }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="submit" class="btn btn-default active btn-block mb15">
                            {{ trans('message.password_sent_reset_link') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

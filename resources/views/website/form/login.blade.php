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
            <label class="control-label">E-Mail Address </label>
            <input type="email" class="form-control" name="email" value="marcoasperti@gmail.com{{ old('email') }}">
        </div>
    </div>
    <div class="form-group">

        <div class="col-md-4 col-lg-offset-4">
            <label class="control-label">Password </label>
            <span class="block ">
            <input type="password" class="form-control" name="password" value="ginaschena">
            </span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember">
                    Remember Me </label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-default active btn-block mb15" style="margin-right: 15px;">
                Login
            </button>
            <a href="{{ URL::to('/password/email/') }}">Forgot Your Password? </a>
        </div>
    </div>
</form>
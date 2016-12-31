<section id="contatti_form" data-role="info-block">
    <div class="container  mv25">
        <div class="row">
            <div class="col-sm-12 text-center ">
               <h2 class="text-uppercase color-main wow bounceInLeft animated">{!! trans('website.info_request') !!}</h2>
            </div>
            <div class="container col-sm-6 col-sm-offset-3  pt15">@include('flash::notification')</div>
            <div class="clearfix"></div>
            {{ Form::open(array('action' => '\App\LaraCms\Website\Controllers\WebsiteFormController@getContactUsForm')) }}
                <div class="col-sm-12">
                    <div class="color-3 text-center mb15 wow bounceInUp animated">{!! trans('website.message.required_field') !!}</div>
                </div>
                <div class="form-group col-sm-6 col-sm-offset-3">
                    {{ Form::label('email',trans('website.email').'*') }}
                    <span class="block ">{{ Form::email('email', null,  ['class' => 'form-control']) }}</span>
                    {{ $errors->first('email') }}
                </div>
                <div class="form-group col-sm-6 col-sm-offset-3">
                    {{ Form::label('name', trans('website.name').'*') }}
                    <span class="block ">{{ Form::text('name', null,  ['class' => 'form-control']) }}</span>
                    {{ $errors->first('name') }}
                </div>
                <div class="form-group col-sm-6 col-sm-offset-3">
                    {{ Form::label('surname',trans('website.surname').'*') }}
                    <span class="block ">{{ Form::text('surname', null,  ['class' => 'form-control']) }}</span>
                    {{ $errors->first('surname') }}
                </div>
                <div class="form-group col-sm-6 col-sm-offset-3">
                    {{ Form::label('company',trans('website.company').'*') }}
                    <span class="block ">{{ Form::text('company', null,  ['class' => 'form-control']) }}</span>
                    {{ $errors->first('company') }}
                </div>
                <div class="form-group col-sm-6 col-sm-offset-3">
                    {{ Form::label('subject', trans('website.subject').'*') }}
                    <span class="block ">{{ Form::text('subject', null,  ['class' => 'form-control']) }}</span>
                    {{ $errors->first('subject') }}
                </div>
                <div class="form-group col-sm-6 col-sm-offset-3">
                    {{ Form::label('message', trans('website.message_email').'*') }}
                    <span class="block ">{{ Form::textarea('message', null,  ['class' => 'form-control']) }}</span>
                    {{ $errors->first('message') }}
                </div>
                <div class="form-group col-sm-6 col-sm-offset-3">
                    {{ Form::checkbox('privacy', 1, 1) }}
                    {{ Form::label('privacy', trans('website.message.privacy') )}}
                    <span class="block ">{{ $errors->first('privacy') }}</span>
                </div>
                <div class="form-group col-sm-6 col-sm-offset-3 ">
                    {{ Form::submit(trans('website.send'), array('class' => 'btn btn-lg btn-primary btn-block mb0')) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</section>
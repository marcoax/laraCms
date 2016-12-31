@extends('emails.master')
@section('content')
    <p>
    {{ trans('website.mail_message.subscribe_newsletter_subject') }}
    <br>
    {{ trans('website.email')}}: <strong>{{ $email }}</strong>
    </p>
@endsection

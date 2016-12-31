@extends('emails.master')
@section('content')

	<p>{{ trans('website.mail_message.contact')}}</p>
	<p><strong>{{ $subject }}</strong></p>
	<ul>
		<li>{{ trans('website.name')}}: <strong>{{ $name }} {{ $surname }}</strong></li>
		<li>{{ trans('website.company')}}: <strong>{{ $company }}</strong></li>
		<li>{{ trans('website.email')}}: <strong>{{ $email }}</strong></li>
		@if( $product)
			<li>Info request from product: <strong>{{ $product }}</strong></li>
		@endif

	</ul>

	<br />
	<p>
		<strong>{{ trans('website.message_email')}}</strong></p>
	    <p>
		@foreach ($messageLines as $messageLine)
			{{ $messageLine }}<br>
		@endforeach
	</p>
@endsection

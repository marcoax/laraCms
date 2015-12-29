@inject('pages','App\Article')
@extends('fe.app')
@section('title', 'Home page')

@section('content')
    @include('fe.shared.carousel')
    @include('fe.partials.servicecarousel',['services' => $article])
@endsection
@section('footerjs')
@endsection


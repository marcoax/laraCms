@inject('pages','App\Article')
@extends('website.app')
@section('title',ucfirst( strtolower( $article->title )) )
@section('content')
    @include('website.partials.page_banner')
    @include('website.partials.servicecarousel',['services' => $article])
@endsection
@section('footerjs')
@endsection

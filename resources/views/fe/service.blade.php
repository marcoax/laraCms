@inject('pages','App\Article')
@extends('fe.app')
@section('title', $article->title)
@section('content')
    @include('fe.partials.page_banner')
    @include('fe.partials.servicecarousel',['services' => $article])
@endsection
@section('footerjs')
@endsection


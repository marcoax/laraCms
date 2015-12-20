@extends('layouts.master')
@section('title', 'Lista prodotti') 



@section('content')
    <h2>Create Product</h2>
 
    {!! Form::model(new App\Product, ['route' => ['products.store']]) !!}
        @include('products/_form', ['submit_text' => 'Create Product'])
    {!! Form::close() !!}
@endsection
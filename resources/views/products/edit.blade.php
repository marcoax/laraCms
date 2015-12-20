@extends('layouts.master')
@section('title', 'Lista prodotti') 



@section('content')
    <h2>Edit Product</h2>
 
    {!! Form::model($product, ['method' => 'PATCH', 'route' => ['products.update', $product->slug]]) !!}
        @include('products/_form', ['submit_text' => 'Edit Product'])
    {!! Form::close() !!}
@endsection
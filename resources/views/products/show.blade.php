@extends('layouts.master')
@section('title', 'Lista prodotti') 



@section('content')
    <h2>{{ $product->name }}</h2>
    <h2>{{ $product->slug }}</h2>
 
   
        
	<p>
        {!! link_to_route('products.index', 'Back to Products') !!} |
        {!! link_to_route('products.create', 'Create Product', $product->slug) !!}
    </p>  
@endsection
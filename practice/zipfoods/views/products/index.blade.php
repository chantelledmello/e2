@extends('templates.master')

@section('title')
All Products
@endsection

@section('content')
<h2> All Products </h2>

<div id="product-index">
@foreach ($products as $product)
<a href = "/product?id={{$product['id']}}">
<div class="product">
    <p class="product-name"> {{$product['name']}} </p>
    <img src = "/images/products/{{$product['id']}}.jpg" class="product-thumb">
</div>

@endforeach
</div>

<p>
    <a href='/products'>Check out our selection of products...</a>
</p>
@endsection

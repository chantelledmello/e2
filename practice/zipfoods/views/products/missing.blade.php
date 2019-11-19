@extends('templates.master')

@section('title')
    Error not found
@endsection

@section('content')
<div id='product-show'>
    <h2>Product {{ $id }} not found</h2>
    <p class='product-description'>
        Uh oh - we were not able to find the product you were looking for.
    </p>
</div>

<a href='/products'>&larr; Check out our other products</a>
@endsection


@extends('templates.master')

@section('title')
   Add New Product
@endsection

@section('content')

<!-- Display errors. If none, display confirmation message -->
@if($app->errorsExist())
<ul class='error alert alert-danger'>
    @foreach($app->errors() as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@elseif($productName)
<div class='alert alert-success'>
   The product {{$productName}} has been successfully added
</div>
@endif

<div id='product-show'>

    <form method='POST' id='product-review' action='/products/save-product'>
        <h3>Add New Product</h3>
        <input type='hidden' name='id' value='id'>
        <div class='form-group'>
            <label for='name'> Product Name</label>
            <input type='text' class="form-control" name='name' id='name' value='{{ $app->old("name")}}'>
        </div>
        <div class='form-group'>
            <label for='price'>Price</label>
            <input type='number' class="form-control" name='price' id='price' value='{{ $app->old("price")}}'>
        </div>
        <div class='form-group'>
            <label for='weight'> Weight</label>
            <input type='number' class="form-control" name='weight' id='weight' value='{{ $app->old("weight")}}'>
        </div>

        <div class='form-group'>
            <label for='available'>Quantity Available</label>
            <input type='number' class="form-control" name='available' id='available' value='{{ $app->old("available")}}'>
        </div>

        <div class='form-group'>
            <label for='perishable'>Perishable</label>
            <input type='number' class="form-control" name='perishable' id='perishable' value='{{ $app->old("perishable")}}'>
        </div>

        <div class='form-group'>
            <label for='description'>Description</label>
            <textarea name='description' id='description' class='form-control'>{{ $app->old("description")}}</textarea>
        </div>


        <button type='submit' class='btn btn-primary'>Add New Product</button>
    </form>
<a href='/products'>&larr; Return to all products</a>
@endsection

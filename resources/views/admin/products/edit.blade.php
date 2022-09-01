@extends('admin.master')
@section('content')

@include('admin.parts.errors')


<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Create New Product</h1>
    <a class="btn btn-dark" href="{{ route('admin.products.index') }}">All Products</a>
</div>
<form action="{{ route('admin.products.update',$product->id) }}" method="post" enctype="multipart/form-data">
@csrf
@method('put')
<div class="mb-3">
    <label for="Name">Name:</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" >
</div>

<div class="input-group">
    <span class="input-group-btn">
      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary" >
        <i class="fa fa-picture-o"></i> Choose
      </a>
    </span>
    <input id="thumbnail" class="form-control" type="text" name="image" value="{{ $product->image }}">
  </div>
  <div id="holder"  style="margin-top:15px;max-height:100px;"></div>


  <div class="mb-3">
    <label for="Description">Description:</label>
    <input type="text" name="description" id="Description" class="form-control"  value="{{ $product->description }}">
</div>

<div class="mb-3">
    <label for="price">price:</label>
    <input type="number" name="price" id="price" class="form-control"  value="{{ $product->price }}" >
</div>

<div class="mb-3">
    <label for="sale_price">sale price:</label>
    <input type="number" name="sale_price" id="sale_price" class="form-control" value="{{ $product->sale_price }}" >
</div>

<div class="mb-3">
    <label for="quantity">quantitye:</label>
    <input type="number" name="qty" id="quantity" class="form-control" value="{{ $product->qty }}">
</div>


  <div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-control">
        <option value="" disabled selected>--Select--</option>
        @foreach ($categories as $item)
            <option {{ $product->category_id == $item->id ? 'selected' : '' }}  value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>
{{-- id	name	image	description	price	sale_price	qty	category_id --}}

<button class="btn btn-success px-5">Save</button>

</form>


@endsection



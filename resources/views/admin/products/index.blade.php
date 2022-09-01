@extends('admin.master')

@section('styles')
<style>
    .table th, .table td {
        vertical-align: middle;
    }
</style>
@stop

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">All Products</h1>
    <a class="btn btn-dark" href="{{ route('admin.products.create') }}">Add New Product</a>
</div>

@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">{{ session('msg') }}</div>
@endif

<table class="table table-hover table-bordered table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Image</th>
        <th>Description</th>
        <th>Price</th>
        <th>Sale Price</th>
        <th>Quntity</th>
        <th>Category</th>
        <th>Create At</th>
        <th>Actions</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>
            @if($product->image)
                <img src="{{$product->image}}" class="img-fluid" style="max-width:80px" alt="{{$product->image}}">
            @else
                <img src="{{asset('backend/img/thumbnail-default.jpg')}}" class="img-fluid" style="max-width:80px" alt="avatar.png">
            @endif
        </td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->sale_price }}</td>
        <td>{{ $product->qty }}</td>
        <td>{{ $product->category->name }}</td>
        <td>{{ $product->created_at->format('Y-m-d') }}</td>
        <td>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.products.edit', $product->id) }}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')"><i class="fas fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div id="custom-menu" style="position:absolute;width:200px;background:#f00;color:#fff;display:none">
    Bahaa
</div>
{{ $products->links() }}

@endsection



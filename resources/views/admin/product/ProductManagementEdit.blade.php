@extends('layouts.admin.master')

@section('content')
<div class="container">
    <h2>Edit Product: {{ $products->product_name }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.products.update', $products->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" class="form-control" value="{{ $products->product_name }}">
        </div>

        <div class="mb-3">
            <label>Cost</label>
            <input type="number" name="product_cost" class="form-control" value="{{ $products->product_cost }}">
        </div>

        <div class="mb-3">
            <label>Discount</label>
            <input type="number" name="discount" class="form-control" value="{{ $products->discount }}">
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ $products->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" value="{{ $products->category }}">
        </div>

        <div class="mb-3">
            <label>Current Image</label><br>
            @if($products->product_image)
                <img src="{{ asset('images/'.$products->product_image) }}" width="100">
            @else
                No image
            @endif
        </div>

        <div class="mb-3">
            <label>New Image</label>
            <input type="file" name="product_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="{{ route('admin.ProductManagement') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

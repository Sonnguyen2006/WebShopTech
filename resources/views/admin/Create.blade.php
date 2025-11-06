@extends('layouts.admin.master')

@section('content')
<div class="container mt-4">
    <h2>Thêm sản phẩm mới</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="product_id" class="form-label">Mã sản phẩm</label>
            <input type="text" name="product_id" id="product_id" class="form-control" required value="{{ old('product_id') }}">
        </div>

        <div class="mb-3">
            <label for="product_name" class="form-label">Tên sản phẩm</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required value="{{ old('product_name') }}">
        </div>

        <div class="mb-3">
            <label for="product_cost" class="form-label">Giá</label>
            <input type="number" name="product_cost" id="product_cost" class="form-control" required value="{{ old('product_cost') }}">
        </div>

        <div class='mb-3'>
            <label for="discount" class="form-label">Giảm giá (%)</label>
            <input type="number" name="discount" id="discount" class="form-control" value="{{ old('discount', 0) }}" min="0" max="100">

        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Phân Loại</label>
           <select name="category" id="category" class="form-select" required>
            <option value="Laptop" {{ old('category') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
            <option value="Điện thoại" {{ old('category') == 'Điện thoại' ? 'selected' : '' }}>Điện thoại</option>
            <option value="Tai nghe" {{ old('category') == 'Tai nghe' ? 'selected' : '' }}>Tai nghe</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="product_image" class="form-label">Ảnh sản phẩm</label>
            <input type="file" name="product_image" id="product_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>
@endsection

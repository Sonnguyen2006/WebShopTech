@extends('layouts.master')

@section('content')
<div class="container my-5">
  <div class="row">
    <div class="col-md-5">
      <img src="{{ asset('public/images/' . $product->product_image) }}" 
           class="img-fluid rounded" 
           alt="{{ $product->product_name }}">
    </div>
    <div class="col-md-7">
      <h3>{{ $product->product_name }}</h3>
      <p class="text-muted">Mã sản phẩm: {{ $product->product_id }}</p>
      <h4 class="text-danger fw-bold mb-3">
        {{ number_format($product->product_price, 0, ',', '.') }}đ
      </h4>
      <p>{{ $product->product_description }}</p>
      

      <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-3">⬅ Quay lại</a>
    </div>
  </div>
</div>
@endsection
@extends('layouts.admin.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Quản lý sản phẩm</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Discount</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    @php
                        $inStock = $product->branches->contains(fn($b) => $b->pivot->quantity > 0);
                    @endphp
                    <tr>
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ number_format($product->product_cost,0,',','.') }} đ</td>
                        <td>{{ $product->discount }}%</td>
                        <td>
                            @if($inStock)
                                <span class="badge bg-success">Còn hàng</span>
                            @else
                                <span class="badge bg-secondary">Hết hàng</span>
                            @endif
                        </td>
                        <td>
                           <a href="{{route('admin.products.edit' , $product->product_id)}}" class="btn btn-sm btn-warning text-white" title="Sửa">
                    <i class="bi bi-pencil-square"></i>
                </a> 
                            
                           <form action="{{ route('admin.delete', $product->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger"
                    onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

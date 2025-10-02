<div class="container mt-4">
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <!-- Ảnh sản phẩm -->
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">

                <!-- Nội dung -->
                <div class="card-body">
                    <!-- Tên sản phẩm -->
                    <h6 class="card-title text-truncate">{{ $product->name }}</h6>

                    <!-- Giá -->
                    <div class="mb-2">
                        @if($product->discount_price)
                            <span class="fw-bold text-danger">{{ number_format($product->discount_price, 0, ',', '.') }}đ</span>
                            <span class="text-muted text-decoration-line-through">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                            <span class="badge bg-danger ms-1">-{{ $product->discount_percent }}%</span>
                        @else
                            <span class="fw-bold text-dark">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

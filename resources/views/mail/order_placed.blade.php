<h2>Đơn hàng #{{ $order->order_id }}</h2>
<p>Xin chào {{ $order->username }},</p>
<p>Trạng thái đơn hàng: <strong>{{ $order->status }}</strong></p>
<p>Tổng tiền: {{ number_format($order->total_amount,0,',','.') }}₫</p>
<p>Cảm ơn bạn đã đặt hàng!</p>

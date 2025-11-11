<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cập nhật đơn hàng</title>
</head>
<body>
    <h2>Đơn hàng #{{ $order->order_id }}</h2>
    <p>Xin chào {{ $order->username }},</p>
    <p>Trạng thái đơn hàng của bạn hiện tại là: <strong>{{ $order->status }}</strong></p>
    <p>Tổng tiền: {{ number_format($order->total_amount, 0, ',', '.') }}₫</p>
    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi!</p>
</body>
</html>

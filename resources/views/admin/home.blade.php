@extends('layouts.admin.master')
@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Dashboard</h2>

    <!-- Biểu đồ miền doanh thu -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            Doanh thu theo tháng
        </div>
        <div class="card-body">
            <canvas id="revenueChart"
                    style="width:100%; height:400px">
            </canvas>
        </div>
    </div>
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            Top 5 Người Dùng Chi Tiêu Cao Nhất
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Tổng chi tiêu</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topUsers as $index => $user)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ number_format($user->total_spent) }} đ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<canvas id="revenueChart" width="400" height="150"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    fetch("{{ route('api.revenue') }}")
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => "Tháng " + item.month);
            const totals = data.map(item => item.total);

            const ctx = document.getElementById('revenueChart').getContext('2d');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Doanh thu',
                        data: totals,
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2
                    }]
                }
            });
        });
</script>


@endsection
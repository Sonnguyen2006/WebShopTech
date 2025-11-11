@extends('layouts.admin.master')


@section('title', 'Quản trị người dùng')

@section('content')
<div class="container-fluid mt-4">
  <div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h5 class="mb-0">Danh sách người dùng</h5>
      <a href="#" class="btn btn-light btn-sm">
        <i class="bi bi-person-plus"></i> Thêm người dùng
      </a>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-light text-center">
            <tr>
              <th>STT</th>
              <th>Tên người dùng</th>
              <th>Email</th>
              <th>Vai trò</th>
              <th>Ngày tạo</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <!-- hiển thị người dùng hiện có trong data -->
    @foreach($user as $item)
        <tr>
            <td>{{ $item->user_id }}</td>
            <td>{{ $item->username }}</td>
            <td>{{ $item->email }}</td>
            <td class="text-center">
                @if($item->role == 'admin')
                    <span class="badge bg-success">Admin</span>
                @else
                    <span class="badge bg-secondary">User</span>
                @endif
            </td>
            <td>{{ $item->created_at->format('Y-m-d') }}</td>
            <!-- các chức năng chỉnh sửa và xem thong tin người dùng -->
            <td class="text-center">
                <a href="#" class="btn btn-sm btn-info text-white" title="Xem chi tiết">
                    <i class="bi bi-eye"></i>
                </a>
                <a href="#}" class="btn btn-sm btn-warning text-white" title="Sửa">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <!-- dùng transaction delect để xóa đi users mong muốn -->
                <form action="#" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" title="Xoá" onclick="return confirm('Bạn chắc chắn muốn xóa người dùng này?')">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>


@endsection
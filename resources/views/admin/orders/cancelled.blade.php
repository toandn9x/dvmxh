@extends('layouts.master')

@section('title', 'Quản lý đơn đã hủy')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <h5 class="card-title mb-0">Danh sách đơn hàng đã hủy</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Người dùng</th>
                                <th scope="col">Dịch vụ</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Hủy bởi</th>
                                <th scope="col">Lý do hủy</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <h6 class="fs-14 mb-1">{{ $order->user->username }}</h6>
                                            <p class="text-muted mb-0">ID: {{ $order->user_id }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h6 class="fs-14 mb-1">{{ $order->package->name }}</h6>
                                    <p class="text-muted mb-0">{{ $order->package->service->name }}</p>
                                </td>
                                <td>{{ number_format($order->quantity) }}</td>
                                <td>{{ number_format($order->total) }}đ</td>
                                <td>
                                    @if($order->cancelled_by == 'api')
                                        <span class="badge bg-danger">API Đối tác</span>
                                    @elseif($order->cancelled_by == 'admin')
                                        <span class="badge bg-warning">Admin</span>
                                    @else
                                        <span class="badge bg-secondary">Hệ thống</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="text-danger fw-medium">{{ $order->cancel_reason ?: 'Không rõ lý do' }}</span>
                                </td>
                                <td>{{ $order->updated_at->format('H:i d/m/Y') }}</td>
                                <td>
                                    <form action="{{ route('admin.orders.retry', $order->id) }}" method="POST" onsubmit="return confirm('Hệ thống sẽ trừ lại tiền của khách và đẩy đơn vào Worker. Bạn có chắc chắn?')">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-soft-success">
                                            <i class="ri-refresh-line align-bottom me-1"></i> Khôi phục đơn
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted">Không có đơn hàng nào bị hủy.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

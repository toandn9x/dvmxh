@extends('layouts.master')

@section('title', 'Quản lý Hàng chờ (Worker)')

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-animate bg-primary">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-white-50 text-truncate mb-0">Đơn đang chờ xử lý</p>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4 text-white"><span class="counter-value">{{ $pendingCount }}</span> đơn</h4>
                        <span class="badge bg-white-50 text-white">Đang trong Redis</span>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-light rounded fs-3">
                            <i class="ri-timer-2-line text-white"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-animate bg-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 overflow-hidden">
                        <p class="text-uppercase fw-medium text-white-50 text-truncate mb-0">Đơn bị lỗi (Failed)</p>
                    </div>
                </div>
                <div class="d-flex align-items-end justify-content-between mt-4">
                    <div>
                        <h4 class="fs-22 fw-semibold ff-secondary mb-4 text-white"><span class="counter-value">{{ $failedJobs->count() }}</span> lỗi</h4>
                        <span class="badge bg-white-50 text-white">Cần kiểm tra</span>
                    </div>
                    <div class="avatar-sm flex-shrink-0">
                        <span class="avatar-title bg-soft-light rounded fs-3">
                            <i class="ri-error-warning-line text-white"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Danh sách đơn lỗi & Chi tiết lỗi API</h4>
                <div class="flex-shrink-0">
                    <form action="{{ route('admin.queue.flush') }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa tất cả lỗi?')">
                        @csrf
                        <button type="submit" class="btn btn-soft-danger btn-sm shadow-none">
                            <i class="ri-delete-bin-line align-middle"></i> Xóa tất cả lỗi
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-nowrap align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Kết nối</th>
                                <th scope="col">Hàng chờ</th>
                                <th scope="col">Thời điểm lỗi</th>
                                <th scope="col">Nội dung lỗi (API Response)</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($failedJobs as $job)
                            <tr>
                                <td>{{ $job->id }}</td>
                                <td><span class="badge badge-soft-info">{{ $job->connection }}</span></td>
                                <td><span class="badge badge-soft-primary">{{ $job->queue }}</span></td>
                                <td>{{ $job->failed_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#errorModal{{ $job->id }}">
                                        Xem chi tiết lỗi
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="errorModal{{ $job->id }}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Chi tiết lỗi đơn hàng #{{ $job->id }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <pre class="bg-light p-3 rounded" style="white-space: pre-wrap;">{{ $job->exception }}</pre>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <form action="{{ route('admin.queue.retry', $job->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Thử lại</button>
                                        </form>
                                        <form action="{{ route('admin.queue.delete-failed', $job->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Không có đơn lỗi nào. Hệ thống đang vận hành tốt!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

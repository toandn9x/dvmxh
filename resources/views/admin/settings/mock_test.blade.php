@extends('layouts.master')

@section('title', 'Hướng dẫn Test Mock API')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Hệ thống giả lập Nhà cung cấp (Mock API)</h4>
            </div>
            <div class="card-body">
                <div class="alert alert-warning border-0" role="alert">
                    <strong>Thông tin quan trọng:</strong> Đây là công cụ giúp bạn test quy trình vận hành của website (Đặt đơn, Worker chạy ngầm, Đồng bộ dịch vụ) mà không cần nạp tiền thật vào bất kỳ đâu.
                </div>

                <h6 class="fw-bold mt-4">1. Thông tin cấu hình Mock API</h6>
                <div class="table-responsive">
                    <table class="table table-bordered bg-light">
                        <tr>
                            <td width="200" class="fw-bold">API URL</td>
                            <td><code>{{ url('/api/mock-provider') }}</code></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">API Key</td>
                            <td><code>mock-api-key-123</code></td>
                        </tr>
                    </table>
                </div>

                <h6 class="fw-bold mt-4">2. Cách sử dụng để Test</h6>
                <ol>
                    <li>Vào menu <strong>Cài đặt -> Cấu hình SMM API</strong>.</li>
                    <li>Tại mục <strong>Nhà cung cấp khác (Tùy chỉnh)</strong> (hoặc sửa trực tiếp TrumSub nếu muốn):
                        <ul>
                            <li>Nhập API URL phía trên vào ô URL.</li>
                            <li>Nhập <code>mock-api-key-123</code> vào ô Key.</li>
                            <li>Nhấn <strong>Lưu cấu hình</strong>.</li>
                        </ul>
                    </li>
                    <li>Sau đó nhấn nút <strong>Đồng bộ dịch vụ ngay</strong>. Hệ thống sẽ kéo 2 dịch vụ giả lập về.</li>
                    <li>Dùng tài khoản người dùng đặt thử đơn hàng cho 2 dịch vụ này.</li>
                    <li>Vào menu <strong>Quản lý Worker</strong> để xem đơn hàng được xử lý như thế nào.</li>
                </ol>

                <div class="mt-4">
                    <p class="text-muted"><em>Lưu ý: Sau khi test xong, hãy nhớ đổi lại thông tin API thật của TrumSub hoặc nhà cung cấp của bạn.</em></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

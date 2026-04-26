@extends('layouts.master')

@section('title', 'Tài liệu API cho Đại lý')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <h5 class="card-title mb-0">Quản lý API Key</h5>
            </div>
            <div class="card-body">
                <div class="alert alert-warning">
                    <strong>Lưu ý:</strong> API Key là mã định danh bảo mật của bạn. Đừng bao giờ chia sẻ nó với người khác.
                </div>
                <div class="mb-3">
                    <label class="form-label">API Key của bạn:</label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $user->api_token ?: 'Bạn chưa tạo API Key' }}" readonly>
                        <form action="{{ route('api.docs.generate') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Làm mới Key</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header border-0">
                <h5 class="card-title mb-0">Tài liệu API (Chuẩn Perfect Panel)</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>HTTP Method</th>
                                <th>API URL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>POST</td>
                                <td><code>{{ url('/api/v2') }}</code></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    <h6>1. Lấy danh sách dịch vụ</h6>
                    <pre class="bg-light p-3 rounded">
{
    "key": "YOUR_API_KEY",
    "action": "services"
}</pre>

                    <h6 class="mt-3">2. Tạo đơn hàng mới</h6>
                    <pre class="bg-light p-3 rounded">
{
    "key": "YOUR_API_KEY",
    "action": "add",
    "service": 1,
    "link": "https://www.facebook.com/zuck",
    "quantity": 1000
}</pre>

                    <h6 class="mt-3">3. Kiểm tra trạng thái đơn</h6>
                    <pre class="bg-light p-3 rounded">
{
    "key": "YOUR_API_KEY",
    "action": "status",
    "order": 123
}</pre>

                    <h6 class="mt-3">4. Kiểm tra số dư tài khoản</h6>
                    <pre class="bg-light p-3 rounded">
{
    "key": "YOUR_API_KEY",
    "action": "balance"
}</pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Cấu hình Cấp độ & Thông báo')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <h5 class="card-title mb-0">Cấu hình Cấp độ & Thông báo</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ngưỡng lên VIP (Tổng nạp)</label>
                            <input type="number" name="vip_threshold" class="form-control" value="{{ setting('vip_threshold', 1000000) }}">
                            <small class="text-muted">Người dùng đạt mức này sẽ tự động lên VIP.</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Ngưỡng lên CTV (Tổng nạp)</label>
                            <input type="number" name="collaborator_threshold" class="form-control" value="{{ setting('collaborator_threshold', 5000000) }}">
                            <small class="text-muted">Người dùng đạt mức này sẽ tự động lên Cộng tác viên.</small>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Thông báo trang chủ</label>
                            <textarea name="home_notification" class="form-control" rows="5">{{ setting('home_notification') }}</textarea>
                            <small class="text-muted">Nội dung hiển thị trong ô thông báo ở Dashboard.</small>
                        </div>
                    </div>
                    <div class="hstack gap-2 justify-content-end">
                        <button type="submit" class="btn btn-primary">Lưu cấu hình</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('deposit.index')

@section('title', 'Nạp tiền chuyển khoản')

@section('content-deposit')
    <div class="tab-pane active" role="tabpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-primary border-0 rounded-top border-bottom border-primary border-3" role="alert">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="ri-information-line fs-24 text-primary"></i>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="alert-heading fs-16 mb-1">Hướng dẫn nạp tiền tự động</h5>
                            <p class="text-muted mb-0">Hệ thống nạp tiền tự động 24/7. Vui lòng chuyển khoản đúng
                                <strong>Nội dung</strong> và <strong>Số tiền</strong> để được cộng tiền ngay lập tức.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-5 text-center border-end">
                @php
                    $bankId = setting('bank_id', 'MB');
                    $accountNo = setting('bank_account_no', '1234567890');
                    $accountName = setting('bank_account_name', 'NGUYEN VAN A');
                    $prefix = trim(setting('bank_description', 'NAP'));
                    $description = $prefix . ' ' . Auth::id();
                    $accountNameEncoded = urlencode($accountName);
                    $descriptionEncoded = urlencode($description);
                    // Sử dụng template 'qr_only' để đảm bảo hiển thị mã QR tốt nhất
                    $qrUrl = "https://img.vietqr.io/image/{$bankId}-{$accountNo}-qr_only.png?addInfo={$descriptionEncoded}&accountName={$accountNameEncoded}";
                @endphp
                <div class="p-3 bg-white rounded-3 d-inline-block shadow-sm mb-3" style="border: 1px solid #eee;">
                    <img src="{{ $qrUrl }}" 
                         alt="VietQR" 
                         class="img-fluid" 
                         style="max-width: 250px; min-height: 250px;"
                         onerror="this.src='https://placehold.co/250x250?text=Loi+Cau+Hinh+Ngan+Hang'">
                </div>
                <p class="text-muted small"><i class="ri-qr-code-line me-1"></i> Quét mã QR bằng ứng dụng Ngân hàng</p>
            </div>

            <div class="col-md-7 ps-md-4">
                <h6 class="fs-14 mb-3 text-uppercase fw-semibold">Thông tin tài khoản</h6>

                <div class="mb-3">
                    <label class="form-label text-muted small mb-1">Ngân hàng thụ hưởng</label>
                    <div class="d-flex align-items-center p-2 border rounded bg-light">
                        <div class="flex-grow-1 fw-bold text-dark">{{ setting('bank_name', 'MB Bank') }}</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small mb-1">Số tài khoản</label>
                    <div class="input-group">
                        <input type="text" class="form-control fw-bold text-primary fs-16" id="accountNo"
                            value="{{ $accountNo }}" readonly>
                        <button class="btn btn-primary" type="button" onclick="copyText('accountNo')">
                            <i class="ri-file-copy-line"></i> Copy
                        </button>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label text-muted small mb-1">Chủ tài khoản</label>
                    <div class="p-2 border rounded bg-light">
                        <div class="fw-bold text-dark text-uppercase">{{ $accountName }}</div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label text-danger small mb-1 fw-bold"><i class="ri-error-warning-line"></i> Nội dung
                        chuyển khoản (Bắt buộc đúng)</label>
                    <div class="input-group">
                        <input type="text" class="form-control fw-bold text-danger fs-18 border-danger" id="transferDesc"
                            value="{{ $description }}" readonly>
                        <button class="btn btn-danger" type="button" onclick="copyText('transferDesc')">
                            <i class="ri-file-copy-line"></i> Copy
                        </button>
                    </div>
                    <small class="text-muted mt-1 d-block">Sai nội dung sẽ khiến việc cộng tiền bị chậm trễ.</small>
                </div>

                <div class="row g-2">
                    <div class="col-6">
                        <div class="p-3 border border-dashed rounded text-center">
                            <h5 class="mb-1">10,000đ</h5>
                            <p class="text-muted mb-0 small">Nạp tối thiểu</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="p-3 border border-dashed rounded text-center">
                            <h5 class="mb-1">Tự động</h5>
                            <p class="text-muted mb-0 small">Thời gian xử lý</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function copyText(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            document.execCommand("copy");

            Swal.fire({
                title: 'Đã sao chép!',
                text: copyText.value,
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
        }
    </script>
@endsection
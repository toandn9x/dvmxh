@extends('layouts.master')

@section('title', 'Lấy ID Facebook')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-animate border-0 shadow-lg">
            <div class="card-header bg-primary py-3">
                <h5 class="card-title mb-0 text-white"><i class="ri-facebook-box-fill me-1"></i> Công cụ Lấy ID Facebook</h5>
            </div>
            <div class="card-body p-4">
                <p class="text-muted">Nhập đường dẫn trang cá nhân hoặc bài viết Facebook để lấy ID dạng số.</p>
                <form action="{{ route('tools.get-facebook-id') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="url_facebook" class="form-label fw-bold">Link Facebook</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-light border-end-0"><i class="ri-link"></i></span>
                            <input type="text" id="url_facebook" name="url_facebook" class="form-control border-start-0 bg-light" placeholder="https://www.facebook.com/zuck" value="{{ old('url_facebook') }}" />
                            <button type="submit" class="btn btn-primary px-4">Lấy ID ngay</button>
                        </div>
                        @error('url_facebook')
                            <div class="text-danger mt-1 small">{{ $message }}</div>
                        @enderror
                    </div>
                </form>

                @if(session('facebook_id'))
                    <div class="mt-4 p-4 bg-soft-success rounded-3 border border-success border-opacity-10">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <div class="avatar-sm">
                                    <div class="avatar-title bg-success rounded-circle fs-20">
                                        <i class="ri-check-line"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-16 mb-1">Kết quả tìm kiếm:</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control fw-bold text-success fs-18" value="{{ session('facebook_id') }}" id="idResult" readonly>
                                    <button class="btn btn-outline-success" onclick="copyId()">Copy ID</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div class="card mt-4 border-0 shadow-sm">
            <div class="card-body">
                <h6><i class="ri-information-line me-1 text-primary"></i> Hướng dẫn sử dụng:</h6>
                <ul class="text-muted mb-0">
                    <li>Copy link trang cá nhân (ví dụ: facebook.com/zuck) hoặc link bài viết.</li>
                    <li>Dán vào ô trên và nhấn "Lấy ID ngay".</li>
                    <li>Sử dụng ID này cho các dịch vụ tăng like, follow trên hệ thống.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
function copyId() {
    var copyText = document.getElementById("idResult");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    
    Swal.fire({
        title: 'Đã copy!',
        text: 'ID ' + copyText.value + ' đã được copy vào bộ nhớ tạm.',
        icon: 'success',
        confirmButtonClass: 'btn btn-primary w-xs mt-2',
        buttonsStyling: false,
        showCloseButton: true
    });
}
</script>
@endsection

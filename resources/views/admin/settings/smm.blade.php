@extends('layouts.master')

@section('title', 'Cấu hình SMM API')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <h5 class="card-title mb-0">Cấu hình SMM API</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Lưu ý: Tên Provider phải khớp với tên bạn nhập trong cấu hình Gói dịch vụ.
                                </div>
                            </div>
                            
                            <!-- Example Provider: trumsub -->
                            <div class="col-md-12 mb-4">
                                <h6 class="fw-bold">Nhà cung cấp: trumsub</h6>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">API URL</label>
                                        <input type="text" name="smm_trumsub_url" class="form-control" value="{{ setting('smm_trumsub_url') }}" placeholder="https://trumsub.com/api/v2">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">API Key</label>
                                        <input type="text" name="smm_trumsub_key" class="form-control" value="{{ setting('smm_trumsub_key') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">% Lợi nhuận (Thành viên)</label>
                                        <div class="input-group">
                                            <input type="number" name="smm_trumsub_profit_member" class="form-control" value="{{ setting('smm_trumsub_profit_member', 50) }}">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">% Lợi nhuận (VIP)</label>
                                        <div class="input-group">
                                            <input type="number" name="smm_trumsub_profit_vip" class="form-control" value="{{ setting('smm_trumsub_profit_vip', 40) }}">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">% Lợi nhuận (CTV)</label>
                                        <div class="input-group">
                                            <input type="number" name="smm_trumsub_profit_collaborator" class="form-control" value="{{ setting('smm_trumsub_profit_collaborator', 30) }}">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="button" id="btnSyncTrumsub" onclick="syncServices('trumsub')" class="btn btn-soft-success btn-sm">
                                            <i class="ri-refresh-line align-bottom me-1"></i> Đồng bộ dịch vụ ngay
                                        </button>
                                        <small class="text-muted ms-2">Hệ thống sẽ tự động cập nhật giá dựa trên giá gốc + % lợi nhuận.</small>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-md-12 mb-4">
                                <h6 class="fw-bold">Nhà cung cấp khác (Tùy chỉnh)</h6>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Tên Provider</label>
                                        <input type="text" name="smm_custom_name" class="form-control" value="{{ setting('smm_custom_name') }}" placeholder="Ví dụ: subgiare">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">API URL</label>
                                        <input type="text" name="smm_custom_url" class="form-control" value="{{ setting('smm_custom_url') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">API Key</label>
                                        <input type="text" name="smm_custom_key" class="form-control" value="{{ setting('smm_custom_key') }}">
                                    </div>
                                </div>
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function syncServices(provider) {
            const profitMember = document.querySelector(`input[name="smm_${provider}_profit_member"]`).value;
            const profitVip = document.querySelector(`input[name="smm_${provider}_profit_vip"]`).value;
            const profitCollab = document.querySelector(`input[name="smm_${provider}_profit_collaborator"]`).value;
            
            Swal.fire({
                title: 'Đang đồng bộ...',
                text: 'Hệ thống đang kéo dịch vụ từ nhà cung cấp, vui lòng không đóng trình duyệt.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            axios.post('{{ route("admin.settings.smm.sync") }}', {
                provider: provider,
                profit_member: profitMember,
                profit_vip: profitVip,
                profit_collaborator: profitCollab
            }).then(res => {
                Swal.fire({
                    title: 'Thành công!',
                    text: res.data.message,
                    icon: 'success'
                });
            }).catch(err => {
                Swal.fire({
                    title: 'Lỗi!',
                    text: err.response?.data?.message || 'Có lỗi xảy ra khi đồng bộ.',
                    icon: 'error'
                });
            });
        }
    </script>
@endpush

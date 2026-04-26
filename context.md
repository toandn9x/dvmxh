# 🧠 Project Technical Context & Roadmap

Tài liệu này dành cho các AI Agent hoặc Nhà phát triển tiếp quản dự án để hiểu rõ kiến trúc và logic nghiệp vụ hiện tại.

## 🏛️ Kiến trúc hệ thống

Hệ thống được xây dựng trên nền tảng **Laravel 9**, triển khai qua **Docker Compose**.

### 1. Docker Services
- **app**: Container chạy PHP-FPM, xử lý logic chính.
- **worker**: Container chạy `php artisan queue:work`, xử lý các tác vụ gửi đơn sang nhà cung cấp và nạp tiền ngầm.
- **nginx**: Web server điều hướng traffic.
- **redis**: Lưu trữ cache, session và quản lý hàng chờ (queue).
- **External DB**: Database MySQL chạy bên ngoài Docker (Host Windows) để đảm bảo an toàn dữ liệu và dễ quản lý. Kết nối qua `host.docker.internal`.

## ⚙️ Logic nghiệp vụ cốt lõi

### 1. Cơ chế SMM API & Đồng bộ giá
- **SmmService**: Lớp trừu tượng (`app/Services/SmmService.php`) xử lý kết nối với các API nhà cung cấp theo chuẩn Perfect Panel.
- **Sync Command**: `app/Console/Commands/SyncProviderServices.php` thực hiện kéo dịch vụ về.
- **Dynamic Pricing**: Giá bán được tính tự động dựa trên:
    - `Giá gốc` + `% Lợi nhuận` (được cấu hình trong Admin).
    - Phân tầng: **Member** (Gốc) > **VIP** (Rẻ hơn) > **CTV** (Rẻ nhất).

### 2. Xử lý đơn hàng (Order Workflow)
- Khi khách đặt đơn, đơn hàng lưu vào DB với trạng thái `Pending`.
- Một **Job** (`App\Jobs\ProcessOrder`) được đẩy vào Queue.
- **Worker** sẽ lấy Job này ra, gọi API nhà cung cấp:
    - Nếu thành công: Cập nhật trạng thái `Processing`.
    - Nếu thất bại: Tự động hoàn tiền vào tài khoản User và cập nhật trạng thái `Cancelled`.

### 3. Nạp tiền tự động
- **VietQR**: Hiển thị tại `resources/views/deposit/bank.blade.php`.
- QR được tạo động, nhúng sẵn nội dung chuyển khoản theo cấu trúc: `NAP [USER_ID]`.
- Hệ thống cần một kịch bản cronjob hoặc webhook (chưa cài đặt hoàn thiện) để kiểm tra lịch sử giao dịch ngân hàng và cộng tiền.

### 4. Hệ thống thông báo
- Sử dụng **Laravel Notification** kết hợp với Telegram.
- Cấu hình Telegram được đồng bộ từ Database (`settings` table) thông qua `AppServiceProvider`.

## 📂 Dữ liệu khởi tạo (Seeders)
- **UserSeeder**: Tạo tài khoản admin.
- **SystemDataSeeder**: (Quan trọng) Chứa toàn bộ "linh hồn" của hệ thống bao gồm Cài đặt, Danh mục và Dịch vụ đã được thiết lập chuẩn.

## 🚀 Hướng phát triển tiếp theo (Roadmap)
- [ ] Tích hợp Webhook/Cronjob đọc lịch sử giao dịch ngân hàng (MB, VCB, BIDV) để tự động cộng tiền.
- [ ] Xây dựng tính năng "Lịch sử nạp tiền" chi tiết hơn cho người dùng.
- [ ] Thêm tính năng "Dịch vụ yêu thích" và "Theo dõi đơn hàng" thời gian thực.
- [ ] Tối ưu hóa UI/UX cho phần quản lý đơn hàng của Admin.

---
*Tài liệu này được cập nhật lần cuối bởi Antigravity Agent.*

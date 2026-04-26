# 🚀 Hệ Thống Dịch Vụ Mạng Xã Hội (SMM Panel) - Premium Edition

Hệ thống quản lý dịch vụ mạng xã hội chuyên nghiệp, tự động hóa hoàn toàn từ khâu đấu nối API nhà cung cấp đến việc xử lý đơn hàng và thông báo cho khách hàng.

![Banner](https://user-images.githubusercontent.com/56961917/171131686-fcd04e30-e23a-4132-b3cf-e8c2b655e6a1.png)

## ✨ Tính năng nổi bật

- **⚡ Tự động hóa SMM API**: Đấu nối không giới hạn các nhà cung cấp SMM (TrumSub, JAP, View.vn, v.v.) theo chuẩn Perfect Panel.
- **📈 Chiến lược giá linh hoạt**: Tự động tính toán giá bán dựa trên % lợi nhuận cho 3 cấp độ: Thành viên, VIP, Cộng tác viên.
- **🛠️ Quản trị thông minh**: 
    - Đồng bộ dịch vụ từ nhà cung cấp chỉ với 1 cú click.
    - Quản lý ngưỡng nạp tiền tự động lên cấp bậc.
- **💰 Nạp tiền tự động**: Tích hợp VietQR chuyên nghiệp, tự động tạo mã QR kèm nội dung chuyển khoản định danh User ID.
- **🔔 Thông báo đa kênh**: Tích hợp Telegram Bot gửi thông báo đơn hàng mới, nạp tiền thành công ngay lập tức.
- **🚀 Hiệu năng cao**: Sử dụng Redis và Queue Worker để xử lý đơn hàng ngầm, đảm bảo website luôn mượt mà.
- **🐳 Dockerized**: Triển khai dễ dàng với Docker Compose, hỗ trợ tách biệt ứng dụng và database bên ngoài.

## 🛠️ Yêu cầu hệ thống

- Docker & Docker Compose
- MySQL (Bên ngoài hoặc trong Docker)
- Redis (Đã tích hợp sẵn trong Docker)

## 🚀 Hướng dẫn cài đặt nhanh

1. **Clone dự án**:
   ```bash
   git clone https://github.com/your-repo/dvmxh.git
   cd dvmxh
   ```

2. **Cấu hình môi trường**:
   - Copy file `.env.example` thành `.env`.
   - Cấu hình database (`DB_HOST=host.docker.internal` nếu dùng DB trên host).
   - Nhập `TELEGRAM_BOT_TOKEN` để nhận thông báo.

3. **Khởi động với Docker**:
   ```bash
   docker-compose up -d
   ```

4. **Khởi tạo dữ liệu**:
   ```bash
   docker-compose exec app php artisan migrate --seed
   ```

5. **Truy cập**:
   - Giao diện người dùng: `http://localhost`
   - Quản trị: `http://localhost/admin` (Mặc định: admin@gmail.com / 12345678)

## 📖 Tài liệu phát triển
Xem chi tiết kiến trúc và luồng xử lý tại [context.md](context.md).

## 📄 Giấy phép
Dự án được phát triển dựa trên giấy phép MIT.

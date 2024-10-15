Yêu cầu:
Git, PHP 8.0, MySQL, Composer, Nodejs
Cài đặt
Bật terminal và trỏ vào thư mục cần tải, sau đó chạy lệnh git clone để tải source code về:

git clone https://github.com/datlechin/DichVu-MXH dvmxh
 
dvmxh là tên thư mục sẽ chứa các file và thư mục của source code

Sau khi tải về xong, trỏ vào thư mục source code:

cd dvmxh
 
Sử dụng composer và npm để chạy 2lệnh sau để tải các thư viện PHP và Javascript:

composer install --optimize-autoloader --no-dev
npm install
 
Quá trình tải thư viện có thể mất tới 1p. Sau khi chạy xong thì quá trình cài đặt đã xong 50%.

Thiết lập
Sao chép tệp .env.example và đổi tên thành .env. Cấu hình thông tin cơ bản trong tệp .env

Dòng 2, sửa APP_ENV thành production
Dòng 3, sửa APP_DEBUG thành false
Từ dòng 14 - 16, cấu hình database
Từ dòng 31 - 38, cấu hình gửi mail
Sau đó chạy lệnh sau để tạo key cho ứng dụng:

php artisan key:generate
 
Tới bước này, có vẻ bạn thắc mắc là tại sao không có file sql để import vào database? Bạn không cần phải import gì cả, chỉ cần chạy lệnh sau để nó tự tạo dữ liệu ra cho bạn:

php artisan migrate --seed
 
Bây giờ trang web của bạn đã hoạt động, nhưng vẫn trang có các tệp css, js, và images cho trang web. Để tạo chạy lệnh sau:

npm run production
 
Và thế là xong, quá trình cài đặt và thiết lập đã hoàn tất. Bây giờ bạn đã có thể sử dụng trang web được.

Tài khoản và mật khẩu mặc định là: demo@demo.com / 123456

Để đổi thông tin tài khoản mặc định của bạn, vào tệp database/seeders/UserSeeder.php để sửa. Sau đó chạy php artisan migrate:fresh --seed để cập nhật lại thông tin.
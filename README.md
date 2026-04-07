# 🎓 Student Management Application

Đây là một ứng dụng quản lý sinh viên, khóa học, bài học và quá trình ghi danh được xây dựng bằng Laravel framework.

## ✨ Tính năng chính
- Quản lý Khóa học (Courses)
- Quản lý Bài học (Lessons) 
- Quản lý Sinh viên (Students)
- Quản lý Ghi danh / Học viên tham gia khóa học (Enrollments)

## 📋 Yêu cầu hệ thống
Đảm bảo máy tính của bạn đã cài đặt các phần mềm sau:
- XAMPP / MAMP / WAMP (hoặc bất kỳ phần mềm nào cung cấp PHP >= 8.1 và MySQL/MariaDB)
- Composer
- Node.js & npm
- Git

## 🚀 Hướng dẫn Cài đặt & Chạy dự án

Bật XAMPP (hoặc công cụ tương tự) và khởi động 2 module là **Apache** và **MySQL** trước khi bắt đầu.

### Bước 1: Clone dự án
Mở terminal/command prompt và sao chép mã nguồn từ GitHub về thư mục làm việc của bạn (ví dụ `C:\xampp\htdocs\`):
```bash
git clone https://github.com/Hellena51204/student-app.git
cd student-app
```

### Bước 2: Cài đặt các thư viện PHP (Composer dependencies)
Chạy lệnh sau để cài đặt các thư viện cần thiết của Laravel:
```bash
composer install
```

### Bước 3: Cài đặt các thư viện Frontend (NPM dependencies)
(Nếu dự án có sử dụng các asset frontend như Vite/Tailwind/Vue...)
```bash
npm install
```

### Bước 4: Thiết lập môi trường (.env)
Tạo file cấu hình môi trường `.env` từ file mẫu `.env.example`:
- Windows (PowerShell/CMD): `copy .env.example .env`
- Mac/Linux: `cp .env.example .env`

### Bước 5: Cấu hình cơ sở dữ liệu
Mở file `.env` vừa tạo và cập nhật lại thông tin kết nối cơ sở dữ liệu cho phù hợp với máy của bạn. Ví dụ đối với XAMPP mặc định:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=student_app    # Tên database bạn muốn tạo
DB_USERNAME=root           # Mặc định của xampp là root
DB_PASSWORD=               # Mặc định của xampp là để trống
```
*Lưu ý:* Hãy mở phpMyAdmin (`http://localhost/phpmyadmin`) và tạo sẵn một cơ sở dữ liệu trống có tên trùng với `DB_DATABASE` (ví dụ: `student_app`).

### Bước 6: Tạo App Key
Tạo key bảo mật cho ứng dụng Laravel:
```bash
php artisan key:generate
```

### Bước 7: Chạy Migrations (Tạo bảng trong Database)
Chạy lệnh sau để Laravel tự động tạo các bảng (users, courses, lessons, students, enrollments...) vào cơ sở dữ liệu của bạn:
```bash
php artisan migrate
```
*(Nếu có dữ liệu mẫu, bạn có thể chạy thêm cờ `--seed`: `php artisan migrate --seed`)*
M
### Bước 8: Khởi chạy dự án

Bây giờ bạn có thể khởi chạy server mô phỏng của Laravel:
```bash
php artisan serve
```
Dự án sẽ hoạt động tại: **http://127.0.0.1:8000**

Nếu dự án có giao diện cần build/biên dịch liên tục (như Vite), hãy mở một cửa sổ Terminal mới (giữ cửa sổ `php artisan serve` chạy ngầm) và gõ:
```bash
npm run dev
```

---

Dự án phát triển bởi **Hellena51204**. Mọi đóng góp xin vui lòng tạo Pull Request hoặc Issues trên GitHub repository!

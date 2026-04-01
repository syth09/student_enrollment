# Bài 3: Đăng Ký Môn Học (Có Quy Tắc) - Laravel

## Giới thiệu

Dự án **Đăng Ký Môn Học** được xây dựng bằng Laravel Framework, thực hiện đầy đủ các chức năng theo yêu cầu của bài tập với các quy tắc nghiêm ngặt:

- Không cho đăng ký trùng môn
- Giới hạn tối đa 18 tín chỉ mỗi sinh viên

## Chức năng đã hoàn thành

- Quản lý Sinh viên (Thêm, Sửa, Xóa, Xem chi tiết)
- Quản lý Môn học (Thêm, Sửa, Xóa, Xem chi tiết + số sinh viên đã đăng ký)
- Đăng ký môn học cho sinh viên
- Hiển thị danh sách môn học đã đăng ký của từng sinh viên
- Tính tổng số tín chỉ của mỗi sinh viên
- Kiểm tra quy tắc:
    - Không cho đăng ký môn trùng
    - Cảnh báo khi vượt quá 18 tín chỉ
- Tìm kiếm và sắp xếp theo tên (A → Z, Z → A) ở cả Sinh viên và Môn học
- Giao diện Bootstrap 5 hiện đại, rõ ràng

## Công nghệ sử dụng

- Laravel 12
- PHP 8.2+
- MySQL
- Blade Template
- Bootstrap 5
- Eloquent ORM + Many-to-Many Relationship
- Form Request Validation (tách lớp)
- Pagination & Query String

## Cấu trúc Database

- `students`: id, name, email, major
- `courses`: id, name, code, credits
- `enrollments`: id, student_id, course_id, timestamps (pivot table)

## Hướng dẫn cài đặt & chạy

### 1. Clone hoặc giải nén dự án

```bash
cd C:\xampp\htdocs
```

### 2. Cài đặt dependencies

```bash
composer install
```

### 3. Copy file môi trường

```bash
cp .env.example .env
```

### 4. Cấu hình Database

- Mở file .env và chỉnh sửa:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=enrollment
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Tạo Database

- Vào phpMyAdmin tạo database tên enrollment.

### 6. Chạy Migration

```bash
php artisan migrate
```

### 7. Chạy dự án

```bash
php artisan serve
```

- Truy cập: http://127.0.0.1:8000/students

## Các chức năng chính

- Quản lý Sinh viên (Thêm, Sửa, Xóa, Xem chi tiết)
- Quản lý Môn học (Thêm, Sửa, Xóa, Xem chi tiết + số sinh viên đã đăng ký)
- Đăng ký môn học cho sinh viên
- Hiển thị danh sách môn học đã đăng ký của từng sinh viên
- Tính tổng số tín chỉ của mỗi sinh viên
- Kiểm tra quy tắc:
    - Không cho đăng ký môn trùng
    - Cảnh báo khi vượt quá 18 tín chỉ
- Tìm kiếm và sắp xếp theo tên (A → Z, Z → A) ở cả Sinh viên và Môn học
- Giao diện Bootstrap 5 hiện đại, rõ ràng

## Yêu cầu quan trọng đã đáp ứng

- Không viết HTML trong Controller
- Bắt buộc sử dụng @csrf trong mọi form
- Validation được tách riêng bằng Form Request
- Code rõ ràng, dễ bảo trì, tuân thủ nguyên tắc MVC
- Giao diện sử dụng Bootstrap 5, tiêu đề có background đẹp

## Thông tin sinh viên

- Họ và tên: Tạ Tuấn Phong
- MSSV: 20220849
- Lớp: DCCNTT 13.10.5
- Môn học: PHP & Laravel - Bài 3: Đăng Ký Môn Học (Có Quy Tắc)

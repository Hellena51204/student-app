<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return "Hello Laravel";
});
// 1. Khai báo sử dụng StudentController (đặt ở gần đầu file, dưới các dòng use khác nếu có)
use App\Http\Controllers\StudentController;

// 2. Tạo các route cho ứng dụng quản lý sinh viên
// Khi truy cập /students, gọi hàm index() để hiển thị danh sách
Route::get('/students', [StudentController::class, 'index']);

// Khi truy cập /students/create, gọi hàm create() để hiển thị form thêm mới
Route::get('/students/create', [StudentController::class, 'create']);

// Route hứng dữ liệu từ Form gửi lên
Route::post('/students/store', [StudentController::class, 'store']);

use App\Models\Employee;

Route::get('/tao-test', function () {
    Employee::create([
        'name' => 'Bui Bao Khang',
        'email' => 'khang@gmail.com',
        'position' => 'Dev'
    ]);
    return "Đã thêm dữ liệu test thành công!";
});

use App\Http\Controllers\EmployeeController;

Route::resource('employees', EmployeeController::class);
// Route cho trang Dashboard (Bài 12)
Route::get('/dashboard', [App\Http\Controllers\EmployeeController::class, 'dashboard'])->name('dashboard');


use App\Models\Category;

Route::get('/tao-danh-muc', function () {
    Category::create(['name' => 'Điện thoại di động']);
    Category::create(['name' => 'Máy tính xách tay']);
    Category::create(['name' => 'Phụ kiện công nghệ']);
    return "Đã tạo 3 danh mục thành công!";
});

use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);
// Route cho Dashboard Sản Phẩm
Route::get('/dashboard-product', [App\Http\Controllers\ProductController::class, 'dashboard'])->name('product.dashboard');

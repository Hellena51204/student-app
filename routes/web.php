<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CourseController; // Controller mới của chúng ta
use App\Models\Employee;
use App\Models\Category;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\EnrollmentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "Hello Laravel";
});

// --- ROUTES CHO QUẢN LÝ SINH VIÊN ---
Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/students/store', [StudentController::class, 'store']);

// --- ROUTES CHO NHÂN VIÊN ---
Route::resource('employees', EmployeeController::class);
Route::get('/dashboard', [EmployeeController::class, 'dashboard'])->name('dashboard');

Route::get('/tao-test', function () {
    Employee::create([
        'name' => 'Bui Bao Khang',
        'email' => 'khang@gmail.com',
        'position' => 'Dev'
    ]);
    return "Đã thêm dữ liệu test thành công!";
});

// --- ROUTES CHO SẢN PHẨM ---
Route::resource('products', ProductController::class);
Route::get('/dashboard-product', [ProductController::class, 'dashboard'])->name('product.dashboard');

Route::get('/tao-danh-muc', function () {
    Category::create(['name' => 'Điện thoại di động']);
    Category::create(['name' => 'Máy tính xách tay']);
    Category::create(['name' => 'Phụ kiện công nghệ']);
    return "Đã tạo 3 danh mục thành công!";
});

// --- ROUTES CHO HỆ THỐNG QUẢN LÝ KHÓA HỌC (MỚI) ---

// Lưu ý: 2 route Thùng rác và Khôi phục phải đặt TRÊN Route::resource
Route::get('/courses-trash', [CourseController::class, 'trash'])->name('courses.trash');
Route::post('/courses/{id}/restore', [CourseController::class, 'restore'])->name('courses.restore');

// Route CRUD cho Khóa học
Route::resource('courses', CourseController::class);
// Route cho quản lý Bài học (Lesson) [cite: 145]
Route::resource('lessons', App\Http\Controllers\LessonController::class);
Route::get('/dashboard-cms', [CourseController::class, 'dashboard'])->name('cms.dashboard');
// Route Dashboard
Route::get('/dashboard-cms', [CourseController::class, 'dashboard'])->name('cms.dashboard');

// Route Khóa học
Route::resource('courses', CourseController::class);
Route::get('/courses-trash', [CourseController::class, 'trash'])->name('courses.trash');

// Route Bài học
Route::resource('lessons', LessonController::class);

// Route Đăng ký
Route::resource('enrollments', EnrollmentController::class);

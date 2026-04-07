<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    // 1. Hiển thị danh sách đăng ký [cite: 89-91]
    public function index()
    {
        $enrollments = Enrollment::with(['course', 'student'])->latest()->paginate(10);
        return view('enrollments.index', compact('enrollments'));
    }

    // 2. Hiển thị Form đăng ký [cite: 84-85]
    public function create()
    {
        $courses = Course::where('status', 'published')->get(); // Chỉ hiện khóa học đã xuất bản
        return view('enrollments.create', compact('courses'));
    }

    // 3. Xử lý lưu đăng ký [cite: 86-88]
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'course_id' => 'required|exists:courses,id'
        ]);

        // Kiểm tra xem học viên đã tồn tại chưa, nếu chưa thì tạo mới
        $student = Student::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        // Lưu thông tin đăng ký vào bảng trung gian
        Enrollment::create([
            'course_id' => $request->course_id,
            'student_id' => $student->id
        ]);

        return redirect()->route('enrollments.index')->with('success', 'Đăng ký khóa học thành công!');
    }
}

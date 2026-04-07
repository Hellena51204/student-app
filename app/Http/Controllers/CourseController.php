<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\CourseRequest; // Import Form Request để Validate
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Student;
use App\Models\Enrollment; // Thư viện tạo Slug tự động

class CourseController extends Controller
{
    /**
     * 1. Hiển thị danh sách khóa học có phân trang [cite: 141, 149]
     */
    public function index()
    {
        // Đếm tổng số bài học của từng khóa và phân trang [cite: 150]
        $courses = Course::withCount('lessons')->paginate(5);

        return view('courses.index', compact('courses'));
    }

    /**
     * 2. Hiển thị form thêm mới [cite: 128]
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * 3. Xử lý lưu khóa học mới vào database [cite: 128]
     */
    public function store(CourseRequest $request)
    {
        $data = $request->validated(); // Lấy dữ liệu đã qua kiểm duyệt [cite: 137]

        // Tự động sinh Slug từ Tên khóa học [cite: 131]
        $data['slug'] = Str::slug($data['name']) . '-' . time();

        // Xử lý upload ảnh [cite: 140]
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Thêm khóa học thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tạm thời chưa dùng đến trong bài này
    }

    /**
     * 4. Hiển thị form Cập nhật (Sửa) [cite: 151]
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        return view('courses.edit', compact('course')); // Truyền dữ liệu cũ ra view [cite: 153]
    }

    /**
     * 5. Xử lý lưu dữ liệu Cập nhật [cite: 151, 152]
     */
    public function update(CourseRequest $request, string $id)
    {
        $course = Course::findOrFail($id);
        $data = $request->validated();

        // Nếu có upload ảnh mới thì lưu, không thì giữ nguyên ảnh cũ [cite: 140]
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('courses', 'public');
        }

        $course->update($data);
        return redirect()->route('courses.index')->with('success', 'Cập nhật khóa học thành công!');
    }

    /**
     * 6. Xóa khóa học (Chuyển vào thùng rác do dùng Soft Delete) [cite: 154, 155]
     */
    public function destroy(string $id)
    {
        Course::findOrFail($id)->delete();
        return redirect()->route('courses.index')->with('success', 'Đã chuyển khóa học vào thùng rác!');
    }

    /**
     * 7. Hiển thị danh sách khóa học trong Thùng rác
     */
    public function trash()
    {
        $courses = Course::onlyTrashed()->paginate(5); // Chỉ lấy những bản ghi đã xóa mềm
        return view('courses.trash', compact('courses'));
    }

    /**
     * 8. Khôi phục khóa học từ Thùng rác [cite: 156]
     */
    public function restore(string $id)
    {
        Course::withTrashed()->findOrFail($id)->restore(); // Tìm kiếm cả trong thùng rác và khôi phục
        return redirect()->route('courses.index')->with('success', 'Khôi phục khóa học thành công!');
    }



    // Hàm thống kê Dashboard 
    public function dashboard()
    {
        $totalCourses = Course::count(); // Tổng số khóa học [cite: 108]
        $totalStudents = Student::count(); // Tổng số học viên [cite: 109]
        $totalRevenue = Course::join('enrollments', 'courses.id', '=', 'enrollments.course_id')->sum('courses.price'); // Tổng doanh thu [cite: 110]

        // 5 khóa học mới nhất [cite: 112]
        $latestCourses = Course::latest()->take(5)->get();

        // Khóa học có nhiều học viên nhất [cite: 111]
        $topCourse = Course::withCount('students')->orderBy('students_count', 'desc')->first();

        return view('dashboard_cms', compact('totalCourses', 'totalStudents', 'totalRevenue', 'latestCourses', 'topCourse'));
    }
}

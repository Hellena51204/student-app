<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    // 1. Hiển thị danh sách bài học theo từng khóa học [cite: 78-80]
    public function index(Request $request)
    {
        $courses = Course::all();
        $selectedCourseId = $request->get('course_id');

        // Nếu có chọn khóa học thì lọc bài học theo khóa đó và sắp xếp theo thứ tự (order) 
        $lessons = Lesson::when($selectedCourseId, function ($query, $selectedCourseId) {
            return $query->where('course_id', $selectedCourseId);
        })->orderBy('order', 'asc')->paginate(10);

        return view('lessons.index', compact('lessons', 'courses', 'selectedCourseId'));
    }

    // 2. Hiển thị form thêm bài học 
    public function create()
    {
        $courses = Course::all(); // Lấy danh sách khóa học để chọn trong dropdown 
        return view('lessons.create', compact('courses'));
    }

    // 3. Lưu bài học mới [cite: 73-77]
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'title' => 'required|string|max:255',
            'order' => 'required|integer|min:0',
            'video_url' => 'nullable|url'
        ]);

        Lesson::create($request->all());

        return redirect()->route('lessons.index')->with('success', 'Thêm bài học thành công!');
    }

    // 4. Xóa bài học [cite: 81]
    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect()->route('lessons.index')->with('success', 'Đã xóa bài học!');
    }
}

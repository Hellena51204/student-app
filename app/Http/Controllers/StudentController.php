<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Bắt buộc thêm dòng này để có thể thao tác với Database

class StudentController extends Controller
{
    // 1. Hàm hiển thị danh sách sinh viên
    public function index()
    {
        // Lấy toàn bộ dữ liệu từ bảng 'students'
        $students = DB::table('students')->get();

        // Trả về view 'index' và truyền biến $students sang để hiển thị
        return view('students.index', ['students' => $students]);
    }

    // 2. Hàm hiển thị Form thêm sinh viên mới
    public function create()
    {
        // Sửa dòng return chữ thành lệnh gọi view
        return view('students.create');
    }

    // 3. Hàm nhận dữ liệu từ Form và lưu vào Database (Thêm)
    public function store(Request $request)
    {
        // Lấy dữ liệu từ form và lưu thẳng vào bảng 'students' trong Database
        DB::table('students')->insert([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'major' => $request->input('major')
        ]);

        // Trả về thông báo sau khi lưu xong
        return "Chúc mừng! Bạn đã thêm sinh viên thành công vào Database.";
    }

    // 4. Hàm hiển thị Form chỉnh sửa thông tin sinh viên (Sửa)
    public function edit($id)
    {
        return "Đây là Form sửa sinh viên có ID: " . $id;
    }

    // 5. Hàm nhận dữ liệu từ Form và cập nhật vào Database (Cập nhật)
    public function update(Request $request, $id)
    {
        // Code cập nhật dữ liệu sẽ viết ở đây
    }

    // 6. Hàm xóa sinh viên khỏi Database (Xóa)
    public function destroy($id)
    {
        // Code xóa dữ liệu sẽ viết ở đây
    }
}

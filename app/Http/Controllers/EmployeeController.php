<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department; // Thêm dòng này để Bài 12 đếm số phòng ban
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu và phân trang (10 bản ghi/trang)
        $employees = Employee::paginate(10);
        return view('employees.index', compact('employees'));
    }

    // Bước 4: Hàm hiển thị Form thêm mới
    public function create()
    {
        return view('employees.create');
    }

    // Bước 5: Hàm nhận dữ liệu từ Form và lưu vào Database
    public function store(Request $request)
    {
        Employee::create($request->all());
        return redirect()->route('employees.index'); // Lưu xong tự động quay về trang danh sách
    }

    // Bài 12: Hàm hiển thị trang thống kê Dashboard
    public function dashboard()
    {
        $totalEmp = Employee::count(); // Đếm tổng nhân viên
        $totalDep = Department::count(); // Đếm tổng phòng ban
        $newEmp = Employee::latest()->take(5)->get(); // Lấy 5 nhân viên mới nhất

        return view('dashboard', compact('totalEmp', 'totalDep', 'newEmp'));
    }
}

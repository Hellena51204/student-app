@extends('layouts.master')

@section('title', 'Trang nhân viên')

@section('content')
<h2>Danh sách nhân viên</h2>

{{-- Gọi component thông báo (Bài 8) --}}
<x-alert message="Thêm thành công!" />

{{-- Nút chuyển sang trang thêm mới (Bài 9) --}}
<div style="margin-bottom: 20px; margin-top: 10px;">
    <a href="{{ route('employees.create') }}">
        <button style="padding: 5px 10px; cursor: pointer;">+ Thêm nhân viên mới</button>
    </a>
</div>

{{-- Hiển thị danh sách nhân viên (Bài 6 & Bài 10) --}}
@forelse($employees as $emp)
<div style="margin-bottom: 10px;">
    <p style="margin: 5px 0;">
        <strong>Họ tên:</strong> {{ $emp->name }}
    </p>
    <p style="margin: 5px 0;">
        <strong>Email:</strong> {{ $emp->email }}
    </p>
    <p style="margin: 5px 0;">
        <strong>Chức vụ:</strong> {{ $emp->position }}
    </p>
    <p style="margin: 5px 0;">
        <strong>Phòng ban:</strong> {{ optional($emp->department)->name ?? 'Chưa xếp phòng' }}
    </p>
</div>
<hr>
...
@empty
<p style="color: red;">Không có dữ liệu nhân viên nào.</p> [cite: 72, 73]
@endforelse {{-- CHỈ GIỮ LẠI MỘT DÒNG NÀY THÔI --}} [cite: 74, 768]

<div style="margin-top: 20px;">
    {{ $employees->links() }} [cite: 152, 342]
</div>
@endsection [cite: 94, 284]
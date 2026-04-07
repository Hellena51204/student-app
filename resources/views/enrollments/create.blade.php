@extends('layouts.master')
@section('title', 'Đăng ký Khóa học')

@section('content')
<div class="card border-0 shadow-sm col-md-6 mx-auto">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold text-primary">Đăng ký học viên mới</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('enrollments.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Họ và tên:</label>
                <input type="text" name="name" class="form-control" placeholder="Nguyễn Văn A" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email liên hệ:</label>
                <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Chọn khóa học:</label>
                <select name="course_id" class="form-select" required>
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }} ({{ number_format($course->price, 0, ',', '.') }}đ)</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Xác nhận Đăng ký</button>
        </form>
    </div>
</div>
@endsection
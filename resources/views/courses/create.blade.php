@extends('layouts.master')
@section('title', 'Thêm Khóa Học')

@section('content')
<h2>Thêm Khóa Học Mới</h2>

{{-- Hiển thị lỗi Validation nếu nhập sai giá hoặc bỏ trống tên --}}
@if ($errors->any())
<div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 20px;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
    @csrf

    <label>Tên khóa học:</label><br>
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nhập tên khóa học..." style="width: 400px;"><br><br>

    <label>Giá (VNĐ):</label><br>
    <input type="number" name="price" value="{{ old('price') }}" placeholder="Ví dụ: 500000"><br><br>

    <label>Mô tả:</label><br>
    <textarea name="description" rows="5" placeholder="Mô tả nội dung khóa học..." style="width: 400px;">{{ old('description') }}</textarea><br><br>

    <label>Trạng thái:</label><br>
    <select name="status">
        <option value="draft">Bản nháp</option>
        <option value="published">Xuất bản</option>
    </select><br><br>

    <label>Ảnh đại diện khóa học:</label><br>
    <input type="file" name="image" accept="image/*"><br><br>

    <button type="submit" style="padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer; border-radius: 4px;">Lưu khóa học</button>
    <a href="{{ route('courses.index') }}" style="margin-left: 10px; text-decoration: none; color: gray;">Hủy bỏ</a>
</form>
@endsection
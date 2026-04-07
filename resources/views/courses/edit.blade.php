@extends('layouts.master')
@section('title', 'Cập nhật Khóa Học')

@section('content')
<h2>Chỉnh sửa Khóa học: {{ $course->name }}</h2>

{{-- Hiển thị lỗi Validation nếu nhập sai giá hoặc để trống tên --}}
@if ($errors->any())
<div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 20px;">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') {{-- Bắt buộc phải có để Laravel hiểu đây là cập nhật  --}}

    <label>Tên khóa học:</label><br>
    <input type="text" name="name" value="{{ old('name', $course->name) }}" style="width: 400px;"><br><br>

    <label>Giá (VNĐ):</label><br>
    <input type="number" name="price" value="{{ old('price', $course->price) }}"><br><br>

    <label>Mô tả:</label><br>
    <textarea name="description" rows="5" style="width: 400px;">{{ old('description', $course->description) }}</textarea><br><br>

    <label>Trạng thái:</label><br>
    <select name="status">
        <option value="draft" {{ $course->status == 'draft' ? 'selected' : '' }}>Bản nháp</option>
        <option value="published" {{ $course->status == 'published' ? 'selected' : '' }}>Xuất bản</option>
    </select><br><br>

    <label>Ảnh hiện tại:</label><br>
    @if($course->image)
    <img src="{{ asset('storage/' . $course->image) }}" width="150" style="margin-bottom: 10px; border-radius: 5px;"><br>
    @endif
    <label>Thay đổi ảnh mới (Nếu có):</label><br>
    <input type="file" name="image" accept="image/*"><br><br>

    <button type="submit" style="padding: 10px 20px; background: orange; color: white; border: none; cursor: pointer;">Cập nhật khóa học</button>
    <a href="{{ route('courses.index') }}" style="margin-left: 10px; text-decoration: none; color: gray;">Quay lại</a>
</form>
@endsection
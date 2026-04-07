@extends('layouts.master')
@section('title', 'Thêm Bài Học')

@section('content')
<div class="card border-0 shadow-sm col-md-8 mx-auto">
    <div class="card-header bg-white py-3">
        <h5 class="mb-0 fw-bold">Tạo bài học mới</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('lessons.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Chọn khóa học: </label>
                <select name="course_id" class="form-select" required>
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tiêu đề bài học:</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Thứ tự hiển thị:</label>
                    <input type="number" name="order" class="form-control" value="1">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Video URL:</label>
                    <input type="url" name="video_url" class="form-control" placeholder="https://youtube.com/...">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Nội dung bài học:</label>
                <textarea name="content" class="form-control" rows="4"></textarea>
            </div>
            <hr>
            <button type="submit" class="btn btn-success px-4">Lưu Bài Học</button>
            <a href="{{ route('lessons.index') }}" class="btn btn-light ms-2">Hủy</a>
        </form>
    </div>
</div>
@endsection
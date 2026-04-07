@extends('layouts.master')
@section('title', 'Quản lý Bài học')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Danh sách Bài học</h2>
    <a href="{{ route('lessons.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Thêm Bài Học</a>
</div>

<div class="card mb-4 border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('lessons.index') }}" method="GET" class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-bold">Lọc theo khóa học:</label>
                <select name="course_id" class="form-select">
                    <option value="">-- Tất cả khóa học --</option>
                    @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $selectedCourseId == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary w-100">Lọc dữ liệu</button>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th class="ps-4">Thứ tự</th>
                    <th>Tiêu đề bài học</th>
                    <th>Thuộc khóa học</th>
                    <th>Video URL</th>
                    <th class="text-end pe-4">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lessons as $lesson)
                <tr>
                    <td class="ps-4"><span class="badge bg-dark">{{ $lesson->order }}</span></td>
                    <td class="fw-bold">{{ $lesson->title }}</td>
                    <td><span class="badge bg-primary-subtle text-primary">{{ $lesson->course->name }}</span></td>
                    <td><small class="text-muted">{{ $lesson->video_url ?? 'Không có' }}</small></td>
                    <td class="text-end pe-4">
                        <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Xóa bài học này?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4">Chưa có bài học nào.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
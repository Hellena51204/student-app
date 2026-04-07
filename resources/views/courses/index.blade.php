@extends('layouts.master')
@section('title', 'Danh sách Khóa học')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Quản lý Khóa Học</h2>
    <a href="{{ route('courses.create') }}" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus me-1"></i> Thêm Khóa Học
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Hình ảnh</th>
                        <th>Tên khóa học</th>
                        <th>Giá bán</th>
                        <th>Trạng thái</th>
                        <th class="text-center">Bài học</th>
                        <th class="text-end pe-4">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                    <tr>
                        <td class="ps-4">
                            @if($course->image)
                            <img src="{{ asset('storage/' . $course->image) }}" class="rounded shadow-sm" width="70" height="50" style="object-fit: cover;">
                            @else
                            <div class="bg-light rounded text-center py-2" width="70"><i class="fas fa-image text-muted"></i></div>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ $course->name }}</div>
                            <small class="text-muted">Slug: {{ $course->slug }}</small>
                        </td>
                        <td><span class="text-danger fw-bold">{{ number_format($course->price, 0, ',', '.') }}đ</span></td>
                        <td>
                            @if($course->status == 'published')
                            <span class="badge bg-success-subtle text-success border border-success">Công khai</span>
                            @else
                            <span class="badge bg-secondary-subtle text-secondary border border-secondary">Bản nháp</span>
                            @endif
                        </td>
                        <td class="text-center"><span class="badge bg-info text-dark">{{ $course->lessons_count }}</span></td>
                        <td class="text-end pe-4">
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Xóa khóa học này?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">Chưa có khóa học nào được tạo.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-4">
    {{ $courses->links('pagination::bootstrap-5') }}
</div>
@endsection
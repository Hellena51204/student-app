@extends('layouts.master')
@section('title', 'Danh sách Đăng ký')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Học viên Đăng ký</h2>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">
        <i class="fas fa-user-plus me-1"></i> Đăng ký mới
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Học viên</th>
                        <th>Email</th>
                        <th>Khóa học đăng ký</th>
                        <th>Học phí</th>
                        <th class="text-end pe-4">Ngày đăng ký</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $enrollment)
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    {{ substr($enrollment->student->name, 0, 1) }}
                                </div>
                                <span class="fw-bold">{{ $enrollment->student->name }}</span>
                            </div>
                        </td>
                        <td>{{ $enrollment->student->email }}</td>
                        <td>
                            <span class="badge bg-info-subtle text-dark border border-info">
                                {{ $enrollment->course->name }}
                            </span>
                        </td>
                        <td><span class="text-success fw-bold">{{ number_format($enrollment->course->price, 0, ',', '.') }}đ</span></td>
                        <td class="text-end pe-4 text-muted">
                            {{ $enrollment->created_at->format('d/m/Y H:i') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">Chưa có lượt đăng ký nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="mt-4">
    {{ $enrollments->links('pagination::bootstrap-5') }}
</div>
@endsection
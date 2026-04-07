@extends('layouts.master')
@section('title', 'Bảng điều khiển EAUT')

@section('content')
<h2 class="fw-bold mb-4">Hệ thống Thống kê EAUT Edu</h2>

<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card bg-primary text-white border-0 shadow-sm">
            <div class="card-body">
                <h5>Tổng khóa học</h5>
                <h2 class="fw-bold">{{ $totalCourses }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white border-0 shadow-sm">
            <div class="card-body">
                <h5>Tổng học viên</h5>
                <h2 class="fw-bold">{{ $totalStudents }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-danger text-white border-0 shadow-sm">
            <div class="card-body">
                <h5>Tổng doanh thu</h5>
                <h2 class="fw-bold">{{ number_format($totalRevenue, 0, ',', '.') }}đ</h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white fw-bold">5 Khóa học mới nhất</div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach($latestCourses as $c)
                    <li class="list-group-item">{{ $c->name }} - <span class="text-muted small">{{ $c->created_at->diffForHumans() }}</span></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-center py-4">
            <div class="card-body">
                <i class="fas fa-trophy fa-3x text-warning mb-3"></i>
                <h5 class="fw-bold">Khóa học HOT nhất</h5>
                <p class="text-primary fw-bold">{{ $topCourse->name ?? 'N/A' }}</p>
                <small class="text-muted">{{ $topCourse->students_count ?? 0 }} học viên đăng ký</small>
            </div>
        </div>
    </div>
</div>
@endsection
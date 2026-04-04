@extends('layouts.master')
@section('title', 'Dashboard Tổng quan')

@section('content')
<h2>Bảng điều khiển Thống kê</h2>

<div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
    <p><strong>Tổng số Nhân viên:</strong> {{ $totalEmp }}</p>
    <p><strong>Tổng số Phòng ban:</strong> {{ $totalDep }}</p>
</div>

<h3>5 Nhân viên mới nhất</h3>
<ul>
    @forelse($newEmp as $e)
    <li>{{ $e->name }} - {{ $e->email }}</li>
    @empty
    <li style="color: red;">Chưa có nhân viên nào.</li>
    @endforelse
</ul>

<br>
<a href="{{ route('employees.index') }}">
    <button style="padding: 5px 10px; cursor: pointer;">Quay lại Danh sách</button>
</a>
@endsection
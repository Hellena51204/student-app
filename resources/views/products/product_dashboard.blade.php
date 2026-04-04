@extends('layouts.master')
@section('title', 'Thống kê Sản Phẩm')

@section('content')
<h2>Dashboard Quản lý Sản Phẩm</h2>

<div style="display: flex; gap: 20px; margin-bottom: 20px;">
    <div style="border: 1px solid #007bff; padding: 15px; border-radius: 5px; background: #e9ecef; flex: 1;">
        <h3 style="color: #007bff; margin-top: 0;">Tổng số Sản phẩm</h3>
        <p style="font-size: 24px; font-weight: bold; margin: 0;">{{ $totalProduct }}</p>
    </div>

    <div style="border: 1px solid #28a745; padding: 15px; border-radius: 5px; background: #e9ecef; flex: 1;">
        <h3 style="color: #28a745; margin-top: 0;">Tổng số Danh mục</h3>
        <p style="font-size: 24px; font-weight: bold; margin: 0;">{{ $totalCategory }}</p>
    </div>
</div>

<h3>5 Sản phẩm mới nhất</h3>
<ul>
    @forelse($newProducts as $sp)
    <li><strong>{{ $sp->name }}</strong> - Giá: {{ number_format($sp->price, 0, ',', '.') }}đ</li>
    @empty
    <li>Chưa có sản phẩm nào.</li>
    @endforelse
</ul>

<br>
<a href="{{ route('products.index') }}" style="padding: 8px 15px; background: gray; color: white; text-decoration: none;">Về danh sách</a>
@endsection
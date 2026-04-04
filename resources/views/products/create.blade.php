@extends('layouts.master')
@section('title', 'Thêm Sản Phẩm')

@section('content')
<h2>Thêm Sản Phẩm Mới</h2>

{{-- Thuộc tính enctype BẮT BUỘC phải có để upload được file --}}
<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf

    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price" step="0.01" required><br><br>

    <label>Số lượng:</label><br>
    <input type="number" name="quantity" required><br><br>

    <label>Danh mục:</label><br>
    <select name="category_id" required>
        @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select><br><br>

    <label>Ảnh sản phẩm (Upload):</label><br>
    <input type="file" name="image" accept="image/*"><br><br>

    <button type="submit" style="padding: 10px; background: green; color: white;">Lưu Sản Phẩm</button>
</form>
@endsection
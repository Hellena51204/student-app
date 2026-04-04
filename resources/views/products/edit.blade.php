@extends('layouts.master')
@section('title', 'Cập nhật Sản Phẩm')

@section('content')
<h2>Chỉnh sửa Sản Phẩm</h2>

{{-- Form cập nhật cần chỉ định route update và id của sản phẩm --}}
<form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    {{-- BẮT BUỘC có @method('PUT') để báo cho Laravel biết đây là hành động cập nhật --}}
    @method('PUT')

    <label>Tên sản phẩm:</label><br>
    <input type="text" name="name" value="{{ $product->name }}" required style="width: 300px;"><br><br>

    <label>Giá:</label><br>
    <input type="number" name="price" value="{{ $product->price }}" required><br><br>

    <label>Số lượng:</label><br>
    <input type="number" name="quantity" value="{{ $product->quantity }}" required><br><br>

    <label>Danh mục:</label><br>
    <select name="category_id" required>
        @foreach($categories as $cat)
        {{-- Dùng toán tử 3 ngôi để tự động chọn đúng danh mục cũ của sản phẩm --}}
        <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
            {{ $cat->name }}
        </option>
        @endforeach
    </select><br><br>

    <label>Ảnh sản phẩm hiện tại:</label><br>
    @if($product->image)
    <img src="{{ asset('storage/' . $product->image) }}" width="150" style="border-radius: 5px; margin-top: 5px;"><br>
    @else
    <i>Chưa có ảnh</i><br>
    @endif
    <br>

    <label>Tải ảnh mới lên (Bỏ trống nếu không muốn thay đổi ảnh):</label><br>
    <input type="file" name="image" accept="image/*"><br><br>

    <button type="submit" style="padding: 10px 15px; background: orange; color: white; border: none; cursor: pointer; font-weight: bold;">Cập nhật Sản Phẩm</button>
    <a href="{{ route('products.index') }}" style="margin-left: 15px; color: gray; text-decoration: none;">Hủy bỏ</a>
</form>
@endsection
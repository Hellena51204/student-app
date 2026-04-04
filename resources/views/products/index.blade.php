@extends('layouts.master')
@section('title', 'Danh sách Sản phẩm')

@section('content')
<h2>Danh sách Sản phẩm</h2>

{{-- Khung hiển thị thông báo thêm/sửa/xóa thành công --}}
@if(session('success'))
<x-alert :message="session('success')" />
@endif

{{-- Form Tìm kiếm và Sắp xếp (Yêu cầu 3.1 & 3.2) --}}
<form method="GET" action="{{ route('products.index') }}" style="margin-bottom: 20px; background: #f9f9f9; padding: 15px; border-radius: 5px;">
    <input type="text" name="search" placeholder="Nhập tên sản phẩm..." value="{{ request('search') }}" style="padding: 5px;">

    <select name="sort" style="padding: 5px;">
        <option value="">-- Sắp xếp mặc định --</option>
        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá: Tăng dần</option>
        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Giảm dần</option>
    </select>

    <button type="submit" style="padding: 6px 12px; background: blue; color: white; border: none; cursor: pointer;">Lọc dữ liệu</button>
</form>

<a href="{{ route('products.create') }}" style="display:inline-block; margin-bottom: 15px; padding: 8px 15px; background: green; color: white; text-decoration: none;">+ Thêm Sản Phẩm Mới</a>

{{-- Bảng danh sách sản phẩm --}}
<table border="1" width="100%" cellpadding="10" style="border-collapse: collapse; text-align: left;">
    <tr style="background-color: #e9ecef;">
        <th>Ảnh</th>
        <th>Tên SP</th>
        <th>Danh mục</th>
        <th>Giá</th>
        <th>Hành động</th>
    </tr>

    @forelse($products as $sp)
    <tr>
        <td>
            {{-- Kiểm tra xem sản phẩm có ảnh không --}}
            @if($sp->image)
            <img src="{{ asset('storage/' . $sp->image) }}" width="60" height="60" style="object-fit:cover; border-radius: 5px;">
            @else
            <i>Chưa có ảnh</i>
            @endif
        </td>
        <td><strong>{{ $sp->name }}</strong></td>

        {{-- Hiển thị tên danh mục thông qua quan hệ belongsTo --}}
        <td>{{ optional($sp->category)->name }}</td>

        <td style="color: red; font-weight: bold;">{{ number_format($sp->price, 0, ',', '.') }} đ</td>
        <td>
            <a href="{{ route('products.edit', $sp->id) }}" style="color: blue; text-decoration: none;">Sửa</a> |

            {{-- Form Xóa có cảnh báo --}}
            <form action="{{ route('products.destroy', $sp->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">
                @csrf
                @method('DELETE')
                <button type="submit" style="color:red; background:none; border:none; cursor:pointer; text-decoration:underline;">Xóa</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="5" align="center" style="color: red;">Chưa có sản phẩm nào trong kho.</td>
    </tr>
    @endforelse
</table>

{{-- Phân trang giữ nguyên tham số tìm kiếm --}}
<div style="margin-top: 20px;">
    {{ $products->appends(request()->query())->links() }}
</div>
@endsection
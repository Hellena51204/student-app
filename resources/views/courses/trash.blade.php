@extends('layouts.master')
@section('title', 'Thùng rác')

@section('content')
<h2>Thùng rác Khóa học</h2>
<p>Danh sách các khóa học đã tạm xóa. Bạn có thể khôi phục lại chúng.</p>

<a href="{{ route('courses.index') }}" style="text-decoration: none; color: blue;">← Quay lại danh sách chính</a><br><br>

<table border="1" width="100%" cellpadding="10" style="border-collapse: collapse;">
    <tr style="background: #eee;">
        <th>Tên khóa học</th>
        <th>Ngày xóa</th>
        <th>Hành động</th>
    </tr>
    @forelse($courses as $course)
    <tr>
        <td>{{ $course->name }}</td>
        <td>{{ $course->deleted_at->format('d/m/Y H:i') }}</td>
        <td>
            {{-- Nút khôi phục sử dụng phương thức POST --}}
            <form action="{{ route('courses.restore', $course->id) }}" method="POST">
                @csrf
                <button type="submit" style="background: green; color: white; padding: 5px 10px; border: none; cursor: pointer; border-radius: 3px;">
                    Khôi phục
                </button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="3" align="center">Thùng rác đang trống.</td>
    </tr>
    @endforelse
</table>

<div style="margin-top: 20px;">
    {{ $courses->links() }}
</div>
@endsection
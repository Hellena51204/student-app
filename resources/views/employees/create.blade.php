@extends('layouts.master')

@section('content')
<h2>Thêm nhân viên mới</h2>

<form method="POST" action="{{ route('employees.store') }}">
    @csrf

    <label>Tên nhân viên:</label>
    <input name="name">
    <br><br>

    <label>Email:</label>
    <input name="email">
    <br><br>

    <label>Vị trí (Position):</label>
    <input name="position">
    <br><br>

    <button type="submit">Save</button>
</form>
@endsection
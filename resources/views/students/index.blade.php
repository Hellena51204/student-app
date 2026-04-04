<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h2>Danh sách sinh viên hiện có</h2>
    <a href="/students/create">Thêm sinh viên mới</a><br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Tuổi</th>
            <th>Chuyên ngành</th>
        </tr>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->age }}</td>
            <td>{{ $student->major }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
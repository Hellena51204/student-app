<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Thêm Sinh Viên Mới</title>
</head>

<body>
    <h2>Nhập thông tin sinh viên</h2>

    <form action="/students/store" method="POST">
        @csrf<label for="name">Tên sinh viên:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="age">Tuổi:</label><br>
        <input type="number" id="age" name="age" required><br><br>

        <label for="major">Chuyên ngành:</label><br>
        <input type="text" id="major" name="major" required><br><br>

        <button type="submit">Lưu thông tin</button>
    </form>
</body>

</html>
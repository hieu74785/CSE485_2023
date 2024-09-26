<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm bài viết</title>
</head>
<body>
    <h1>Thêm bài viết mới</h1>
    <form action="index.php?controller=article&action=create" method="POST">
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" required>
        <br>
        <label for="content">Nội dung:</label>
        <textarea name="content" required></textarea>
        <br>
        <button type="submit">Thêm bài viết</button>
    </form>
    <a href="index.php?controller=article&action=index">Quay lại danh sách</a>
</body>
</html>
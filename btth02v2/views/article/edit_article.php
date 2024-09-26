<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài viết</title>
</head>
<body>
    <h1>Sửa bài viết</h1>
    <form action="index.php?controller=article&action=edit&id=<?php echo $article->getId(); ?>" method="POST">
        <label for="title">Tiêu đề:</label>
        <input type="text" name="title" value="<?php echo $article->getTitle(); ?>" required>
        <br>
        <label for="content">Nội dung:</label>
        <textarea name="content" required><?php echo $article->getContent(); ?></textarea>
        <br>
        <button type="submit">Cập nhật bài viết</button>
    </form>
    <a href="index.php?controller=article&action=index">Quay lại danh sách</a>
</body>
</html>
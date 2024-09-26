<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài viết</title>
</head>
<body>
    <h1>Danh sách bài viết</h1>
    <a href="index.php?controller=article&action=create">Thêm bài viết mới</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?php echo $article->getId(); ?></td>
                <td><?php echo $article->getTitle(); ?></td>
                <td><?php echo $article->getContent(); ?></td>
                <td>
                    <a href="index.php?controller=article&action=edit&id=<?php echo $article->getId(); ?>">Sửa</a>
                    <a href="index.php?controller=article&action=delete&id=<?php echo $article->getId(); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
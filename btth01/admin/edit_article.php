<?php
include '../db.php'; // Kết nối cơ sở dữ liệu

// Lấy mã bài viết từ URL
if (isset($_GET['id'])) {
    $ma_bviet = $_GET['id'];

    // Truy vấn để lấy thông tin bài viết
    $sql = "SELECT baiviet.*, theloai.ten_tloai, tacgia.ten_tgia 
            FROM baiviet 
            JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai 
            JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia 
            WHERE baiviet.ma_bviet = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ma_bviet);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy bài viết.";
        exit;
    }
} else {
    echo "Mã bài viết không được cung cấp.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa bài viết</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h3>Sửa thông tin bài viết</h3>
        <form action="process_edit_article.php" method="post">
            <input type="hidden" name="ma_bviet" value="<?php echo $row['ma_bviet']; ?>">
            <div class="mb-3">
                <label for="tieude" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" name="tieude" value="<?php echo htmlspecialchars($row['tieude']); ?>" required placeholder="nhap tieu de bai hat ">
            </div>
            <div class="mb-3">
                <label for="ten_bhat" class="form-label">Tên bài hát</label>
                <input type="text" class="form-control" name="ten_bhat" value="<?php echo htmlspecialchars($row['ten_bhat']); ?>" required placeholder="nhap ten bai hat ">
            </div>
            <div class="mb-3">
                <label for="ma_tloai" class="form-label">Thể loại</label>
                <input type="text" class="form-control" name="ma_tloai" value="<?php echo htmlspecialchars($row['ma_tloai']); ?>" required placeholder="nhap ma the loai">
            </div>
            <div class="mb-3">
                <label for="tomtat" class="form-label">Tóm tắt</label>
                <input type="text" class="form-control" name="tomtat" value="<?php echo htmlspecialchars($row['tomtat']); ?>" required placeholder="nhap tom tat ">
            </div>
            <div class="mb-3">
                <label for="ma_tgia" class="form-label">Tác giả</label>
                <input type="text" class="form-control" name="ma_tgia" value="<?php echo htmlspecialchars($row['ma_tgia']); ?>" required placeholder="nhap ma tac gia">
            </div>
            <div class="mb-3">
                <label for="ngayviet" class="form-label">Ngày viết</label>
                <input type="datetime-local" class="form-control" name="ngayviet" value="<?php echo date('Y-m-d\TH:i', strtotime($row['ngayviet'])); ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Lưu lại</button>
            <a href="article.php" class="btn btn-warning">Quay lại</a>
        </form>
    </div>
</body>
</html>

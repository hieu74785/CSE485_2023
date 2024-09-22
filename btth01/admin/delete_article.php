<?php
include '../db.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra xem có nhận được mã bài viết không
if (isset($_GET['id'])) {
    $ma_bviet = $_GET['id'];

    // Chuẩn bị truy vấn xóa
    $sql = "DELETE FROM baiviet WHERE ma_bviet = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ma_bviet);

    // Thực hiện truy vấn
    if ($stmt->execute()) {
        // Nếu xóa thành công, chuyển hướng về trang bài viết với thông báo
        header("Location: article.php");
    } else {
        // Nếu có lỗi xảy ra
        echo "Có lỗi xảy ra: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
} else {
    // Nếu không có mã bài viết được gửi
    echo "Mã bài viết không được cung cấp.";
    exit;
}
?>

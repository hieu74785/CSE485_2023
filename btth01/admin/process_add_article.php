<?php
include '../db.php'; // Kết nối cơ sở dữ liệu

// Lấy dữ liệu từ form
$tieude = $_POST['tieude'];
$ten_bhat = $_POST['ten_bhat'];
$ma_tloai = $_POST['ma_tloai']; // Có thể là từ dropdown
$tomtat = $_POST['tomtat'];
$ma_tgia = $_POST['ma_tgia']; // Có thể là từ dropdown
$ngayviet = $_POST['ngayviet'];



// Nếu không có lỗi, thực hiện truy vấn thêm bài viết mới
$sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
        VALUES (?, ?, ?, ?, ?, ?)";

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $tieude, $ten_bhat, $ma_tloai, $tomtat, $ma_tgia, $ngayviet);

// Thực hiện câu lệnh
if ($stmt->execute()) {
    echo "Thêm bài viết thành công!";
    header("Location: article.php"); // Chuyển hướng về trang danh sách bài viết
    exit;
} else {
    echo "Có lỗi xảy ra: " . $stmt->error;
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>

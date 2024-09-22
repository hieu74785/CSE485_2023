<?php
include '../db.php'; // Kết nối cơ sở dữ liệu

// Lấy dữ liệu từ form
$ten_tgia = $_POST['ten_tgia'];

// Nếu không có lỗi, thực hiện truy vấn thêm thể loại mới
$sql = "INSERT INTO tacgia (ten_tgia) 
        VALUES (?)";

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ten_tgia);

// Thực hiện câu lệnh
if ($stmt->execute()) {
    echo "Thêm tác giả thành công!";
    header("Location: author.php"); // Chuyển hướng về trang danh sách thể loại
    exit;
} else {
    echo "Có lỗi xảy ra: " . $stmt->error;
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>

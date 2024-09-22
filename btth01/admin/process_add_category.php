<?php
include '../db.php'; // Kết nối cơ sở dữ liệu

// Lấy dữ liệu từ form
$ten_tloai = $_POST['ten_tloai'];

// Nếu không có lỗi, thực hiện truy vấn thêm thể loại mới
$sql = "INSERT INTO theloai ( ten_tloai) 
        VALUES (?)";

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ten_tloai);

// Thực hiện câu lệnh
if ($stmt->execute()) {
    echo "Thêm thể loại thành công!";
    header("Location: category.php"); // Chuyển hướng về trang danh sách thể loại
    exit;
} else {
    echo "Có lỗi xảy ra: " . $stmt->error;
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>

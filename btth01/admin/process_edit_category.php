<?php
include '../db.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra nếu đã gửi dữ liệu từ form
if (isset($_POST['ma_tloai']) && isset($_POST['ten_tloai'])) {
    // Lấy dữ liệu từ form
    $ma_tloai = $_POST['ma_tloai'];
    $ten_tloai = $_POST['ten_tloai'];

    // Debug dữ liệu từ form (nếu cần)
    var_dump($_POST);

    // Truy vấn để cập nhật thể loại
    $sql = "UPDATE theloai SET ten_tloai = ? WHERE ma_tloai = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Lỗi chuẩn bị câu truy vấn: " . $conn->error;
        exit;
    }

    // Bind tham số (ten_tloai là chuỗi, ma_tloai là số nguyên)
    $stmt->bind_param("si", $ten_tloai, $ma_tloai);

    // Thực hiện câu lệnh và kiểm tra kết quả
    if ($stmt->execute()) {
        echo "Cập nhật thể loại thành công!";
        header("Location: category.php"); // Chuyển hướng về trang danh sách thể loại
        exit;
    } else {
        echo "Có lỗi xảy ra: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
} else {
    echo "Dữ liệu không đầy đủ.";
    exit;
}
?>

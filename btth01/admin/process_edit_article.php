<?php
include '../db.php'; // Kết nối cơ sở dữ liệu

// Lấy mã bài viết từ POST
if (isset($_POST['ma_bviet'])) {
    $ma_bviet = $_POST['ma_bviet'];

    // Lấy dữ liệu từ form
    $tieude = $_POST['tieude'];
    $ten_bhat = $_POST['ten_bhat'];
    $ma_tloai = $_POST['ma_tloai'];
    $tomtat = $_POST['tomtat'];
    $ma_tgia = $_POST['ma_tgia'];
    $ngayviet = $_POST['ngayviet'];

    // Debug dữ liệu từ form
    var_dump($_POST);

    // Truy vấn để cập nhật bài viết
    $sql = "UPDATE baiviet SET tieude = ?, ten_bhat = ?, ma_tloai = ?, tomtat = ?, ma_tgia = ?, ngayviet = ? WHERE ma_bviet = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Lỗi chuẩn bị câu truy vấn: " . $conn->error;
        exit;
    }

    $stmt->bind_param("ssssssi", $tieude, $ten_bhat, $ma_tloai, $tomtat, $ma_tgia, $ngayviet, $ma_bviet);

    // Thực hiện câu lệnh và kiểm tra kết quả
    if ($stmt->execute()) {
        echo "Cập nhật thành công!";
        header("Location: article.php");
        exit;
    } else {
        echo "Có lỗi xảy ra: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
} else {
    echo "Mã bài viết không được cung cấp.";
    exit;
}
?>

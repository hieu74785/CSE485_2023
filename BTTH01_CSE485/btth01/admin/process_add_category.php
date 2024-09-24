<<<<<<< HEAD
<?php
include '../Connect/db.php'; // Kết nối CSDL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem tên thể loại có được gửi không
    if (isset($_POST['ten_tloai'])) {
        $ten_tloai = $_POST['ten_tloai'];

        // Thực hiện truy vấn để thêm thể loại
        $sql = "INSERT INTO theloai (ten_tloai) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $ten_tloai);

        if ($stmt->execute()) {
            header("Location: category.php"); // Chuyển hướng về danh sách thể loại
            exit;
        } else {
            echo "Lỗi: " . $stmt->error;
        }
    } else {
        echo "Tên thể loại không được gửi.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>
=======
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
>>>>>>> f0afc58cf6b9c85540dfb889ad873f6e75aed675

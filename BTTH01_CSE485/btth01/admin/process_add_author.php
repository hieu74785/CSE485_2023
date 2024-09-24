<<<<<<< HEAD
<?php
include '../Connect/db.php'; // Kết nối CSDL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem tên thể loại có được gửi không
    if (isset($_POST['ten_tgia'])) {
        $ten_tgia = $_POST['ten_tgia'];

        // Thực hiện truy vấn để thêm thể loại
        $sql = "INSERT INTO tacgia (ten_tgia) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $ten_tgia);

        if ($stmt->execute()) {
            header("Location: author.php"); // Chuyển hướng về danh sách thể loại
            exit;
        } else {
            echo "Lỗi: " . $stmt->error;
        }
    } else {
        echo "Tên tác giả không được gửi.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}
?>
=======
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
>>>>>>> f0afc58cf6b9c85540dfb889ad873f6e75aed675

<<<<<<< HEAD
<?php
// Kết nối CSDL từ file db.php
include '../Connect/db.php';

if (isset($_GET['ma_bviet'])) {
    // Nhận ma_bviet của bài viết cần xóa
    $ma_bviet = intval($_GET['ma_bviet']); // Chuyển đổi thành số nguyên

    // Kiểm tra xem ma_bviet có hợp lệ không
    if ($ma_bviet > 0) {
        // Câu lệnh xóa
        $sql = "DELETE FROM baiviet WHERE ma_bviet = ?";
        
        // Chuẩn bị câu truy vấn
        if ($stmt = $conn->prepare($sql)) {
            // Gán giá trị cho tham số trong truy vấn
            $stmt->bind_param("i", $ma_bviet);

            // Thực thi truy vấn
            if ($stmt->execute()) {
                // Chuyển hướng về trang danh sách bài viết sau khi xóa thành công
                header("Location: article.php");
                exit;
            } else {
                // Thông báo lỗi nếu có vấn đề khi xóa dữ liệu
                echo "Lỗi: " . $stmt->error;
            }
            $stmt->close(); // Đóng statement
        } else {
            echo "Lỗi khi chuẩn bị câu truy vấn: " . $conn->error;
        }
    } else {
        echo "ID bài viết không hợp lệ.";
    }
} else {
    // Thông báo nếu không có ma_bviet hoặc yêu cầu không hợp lệ
    echo "Yêu cầu không hợp lệ.";
}

// Đóng kết nối
$conn->close();
?>
=======
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
>>>>>>> f0afc58cf6b9c85540dfb889ad873f6e75aed675

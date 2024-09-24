<<<<<<< HEAD
<?php
include '../Connect/db.php'; // Kết nối CSDL

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa tất cả các bài viết liên quan đến thể loại
    $delete_articles_sql = "DELETE FROM baiviet WHERE ma_tloai = ?";
    $stmt = $conn->prepare($delete_articles_sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Sau đó, xóa thể loại 
    $delete_category_sql = "DELETE FROM theloai WHERE ma_tloai = ?";
    $stmt = $conn->prepare($delete_category_sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: category.php"); // Chuyển hướng về danh sách thể loại
    exit;
} else {
    echo "ID không hợp lệ.";
    exit;
}
?>
=======
<?php
include '../db.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra xem có nhận được mã thể loại không
if (isset($_GET['id'])) {
    $ma_tloai = $_GET['id'];

    // Kiểm tra xem thể loại có đang được sử dụng trong bài viết hay không
    $check_sql = "SELECT COUNT(*) AS count FROM baiviet WHERE ma_tloai = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $ma_tloai);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    $row = $check_result->fetch_assoc();

    if ($row['count'] > 0) {
        // Nếu thể loại đang liên kết với bài viết
        echo "Thể loại đang liên kết với một bài viết. Vui lòng xóa bài viết trước.";
    } else {
        // Nếu thể loại không liên kết với bài viết, tiến hành xóa
        $delete_sql = "DELETE FROM theloai WHERE ma_tloai = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("s", $ma_tloai);

        if ($delete_stmt->execute()) {
            // Nếu xóa thành công, chuyển hướng về trang danh sách thể loại
            header("Location: category.php");
            exit;
        } else {
            // Nếu có lỗi xảy ra
            echo "Có lỗi xảy ra khi xóa thể loại: " . $delete_stmt->error;
        }

        $delete_stmt->close();
    }

    // Đóng kết nối
    $check_stmt->close();
    $conn->close();
} else {
    // Nếu không có mã thể loại được gửi
    echo "Mã thể loại không được cung cấp.";
    exit;
}
?>
>>>>>>> f0afc58cf6b9c85540dfb889ad873f6e75aed675

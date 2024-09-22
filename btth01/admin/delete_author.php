<?php
include '../db.php'; // Kết nối cơ sở dữ liệu

// Kiểm tra xem có nhận được mã thể loại không
if (isset($_GET['id'])) {
    $ma_tgia = $_GET['id'];

    // Kiểm tra xem thể loại có đang được sử dụng trong bài viết hay không
    $check_sql = "SELECT COUNT(*) AS count FROM baiviet WHERE ma_tgia = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $ma_tgia);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();
    $row = $check_result->fetch_assoc();

    if ($row['count'] > 0) {
        // Nếu thể loại đang liên kết với bài viết
        echo "Thể loại đang liên kết với một bài viết. Vui lòng xóa bài viết trước.";
    } else {
        // Nếu thể loại không liên kết với bài viết, tiến hành xóa
        $delete_sql = "DELETE FROM tacgia WHERE ma_tgia = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("s", $ma_tgia);

        if ($delete_stmt->execute()) {
            // Nếu xóa thành công, chuyển hướng về trang danh sách thể loại
            header("Location: author.php");
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
    echo "Mã tác giả không được cung cấp.";
    exit;
}
?>

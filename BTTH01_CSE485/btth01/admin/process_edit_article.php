<<<<<<< HEAD
<?php
// Kết nối CSDL từ file db.php
include '../Connect/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
    $ma_bviet = intval($_POST['ma_bviet']);
    $tieude = $_POST['tieude'];
    $ten_bai_hat = $_POST['ten_bhat'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $ma_tloai = $_POST['ma_tloai'];
    $ma_tgia = $_POST['ma_tgia'];
    $new_tloai = $_POST['new_tloai'] ?? '';
    $new_tgia = $_POST['new_tgia'] ?? '';

    // Nếu có thể loại mới, thêm vào cơ sở dữ liệu
    if (!empty($new_tloai)) {
        $insert_tloai_sql = "INSERT INTO theloai (ten_tloai) VALUES (?)";
        if ($insert_stmt = $conn->prepare($insert_tloai_sql)) {
            $insert_stmt->bind_param("s", $new_tloai);
            $insert_stmt->execute();
            $ma_tloai = $conn->insert_id; // Lấy ma_tloai vừa được thêm
            $insert_stmt->close();
        } else {
            echo "Lỗi thêm thể loại: " . $conn->error;
        }
    }

    // Nếu có tác giả mới, thêm vào cơ sở dữ liệu
    if (!empty($new_tgia)) {
        $insert_tgia_sql = "INSERT INTO tacgia (ten_tgia) VALUES (?)";
        if ($insert_stmt = $conn->prepare($insert_tgia_sql)) {
            $insert_stmt->bind_param("s", $new_tgia);
            $insert_stmt->execute();
            $ma_tgia = $conn->insert_id; // Lấy ma_tgia vừa được thêm
            $insert_stmt->close();
        } else {
            echo "Lỗi thêm tác giả: " . $conn->error;
        }
    }

    // Cập nhật bài viết trong cơ sở dữ liệu
    $update_sql = "UPDATE baiviet SET tieude = ?, ten_bhat = ?, tomtat = ?, noidung = ?, ma_tloai = ?, ma_tgia = ? WHERE ma_bviet = ?";
    if ($update_stmt = $conn->prepare($update_sql)) {
        $update_stmt->bind_param("ssssiii", $tieude, $ten_bai_hat, $tomtat, $noidung, $ma_tloai, $ma_tgia, $ma_bviet);
        if ($update_stmt->execute()) {
            echo "Cập nhật bài viết thành công.";
            // Redirect to the articles page or another page
            header("Location: article.php");
            exit();
        } else {
            echo "Lỗi cập nhật bài viết: " . $conn->error;
        }
        $update_stmt->close();
    } else {
        echo "Lỗi chuẩn bị câu lệnh cập nhật: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Yêu cầu không hợp lệ.";
}
=======
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
>>>>>>> f0afc58cf6b9c85540dfb889ad873f6e75aed675

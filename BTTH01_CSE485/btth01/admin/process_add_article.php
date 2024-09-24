<<<<<<< HEAD
<?php
// Kết nối CSDL từ file db.php
include '../Connect/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem các trường dữ liệu có được gửi không
    if (isset($_POST['ten_tieu_de'], $_POST['tom_tat'], $_POST['ten_bhat'], $_POST['ma_tloai'], $_POST['ma_tgia'], $_POST['noidung'])) {
        // Nhận giá trị từ form
        $ten_tieu_de = $_POST['ten_tieu_de'];
        $tom_tat = $_POST['tom_tat'];
        $ten_bhat = $_POST['ten_bhat'];
        $ma_tloai = $_POST['ma_tloai'];
        $ma_tgia = $_POST['ma_tgia'];
        $noidung = $_POST['noidung'];
        $ngayviet = date('Y-m-d'); // Lấy ngày hiện tại
        
        // Truy vấn thêm bài viết với tất cả các cột tương ứng
        $sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        // Chuẩn bị câu truy vấn
        $stmt = $conn->prepare($sql);
        
        // Gán giá trị cho các tham số trong truy vấn
        $stmt->bind_param("ssissss", $ten_tieu_de, $ten_bhat, $ma_tloai, $tom_tat, $noidung, $ma_tgia, $ngayviet);

        // Thực thi truy vấn
        if ($stmt->execute()) {
            // Chuyển hướng về trang danh sách bài viết sau khi thêm thành công
            header("Location: article.php");
            exit;
        } else {
            // Thông báo lỗi nếu có vấn đề khi thêm dữ liệu
            echo "Lỗi: " . $stmt->error;
        }
    } else {
        // Thông báo nếu dữ liệu không đầy đủ
        echo "Dữ liệu không hợp lệ.";
    }
} else {
    // Thông báo nếu yêu cầu không phải là POST
    echo "Yêu cầu không hợp lệ.";
}
?>
=======
<?php
include '../db.php'; // Kết nối cơ sở dữ liệu

// Lấy dữ liệu từ form
$tieude = $_POST['tieude'];
$ten_bhat = $_POST['ten_bhat'];
$ma_tloai = $_POST['ma_tloai']; // Có thể là từ dropdown
$tomtat = $_POST['tomtat'];
$ma_tgia = $_POST['ma_tgia']; // Có thể là từ dropdown
$ngayviet = $_POST['ngayviet'];



// Nếu không có lỗi, thực hiện truy vấn thêm bài viết mới
$sql = "INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, ma_tgia, ngayviet) 
        VALUES (?, ?, ?, ?, ?, ?)";

// Chuẩn bị câu lệnh
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $tieude, $ten_bhat, $ma_tloai, $tomtat, $ma_tgia, $ngayviet);

// Thực hiện câu lệnh
if ($stmt->execute()) {
    echo "Thêm bài viết thành công!";
    header("Location: article.php"); // Chuyển hướng về trang danh sách bài viết
    exit;
} else {
    echo "Có lỗi xảy ra: " . $stmt->error;
}

// Đóng kết nối
$stmt->close();
$conn->close();
?>
>>>>>>> f0afc58cf6b9c85540dfb889ad873f6e75aed675

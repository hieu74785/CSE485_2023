<?php
define('DB_HOST', 'localhost'); // Tên server của bạn
define('DB_USER', 'root');       // Username MySQL
define('DB_PASS', '');           // Mật khẩu MySQL (nếu có)
define('DB_NAME', 'btth01_cse485'); // Tên cơ sở dữ liệu

function getDatabaseConnection() {
    // Tạo kết nối
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    return $conn; // Trả về đối tượng kết nối
}
?>

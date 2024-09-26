<?php
require_once '../config/db.php';

class CategoryModel {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection; // Kết nối đến cơ sở dữ liệu
    }

    // Lấy tất cả các thể loại từ database
    public function getAllCategories() {
        $query = "SELECT * FROM theloai";
        $result = mysqli_query($this->conn, $query);
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $categories;
    }

    // Lấy một thể loại theo mã ID
    public function getCategoryById($id) {
        $query = "SELECT * FROM theloai WHERE ma_tloai = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }

    // Tạo một thể loại mới
    public function createCategory($name) {
        $query = "INSERT INTO theloai (ten_tloai) VALUES (?)";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 's', $name);
        return mysqli_stmt_execute($stmt);
    }

    // Cập nhật một thể loại
    public function updateCategory($id, $name) {
        $query = "UPDATE theloai SET ten_tloai = ? WHERE ma_tloai = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'si', $name, $id);
        return mysqli_stmt_execute($stmt);
    }

    // Xóa một thể loại
    public function deleteCategoryById($id) {
        $query = "DELETE FROM theloai WHERE ma_tloai = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return mysqli_stmt_execute($stmt);
    }
}
?>

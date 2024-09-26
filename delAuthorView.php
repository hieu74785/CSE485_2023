<?php
include '../Connect/db.php'; // Kết nối CSDL

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_author_sql = "DELETE FROM tacgia WHERE ma_tgia = ?";
    $stmt = $conn->prepare($delete_author_sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $delete_category_sql = "DELETE FROM theloai WHERE ma_tloai = ?";
    $stmt = $conn->prepare($delete_category_sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: author.php"); 
    exit;
} else {
    echo "ID không hợp lệ.";
    exit;
}
?>

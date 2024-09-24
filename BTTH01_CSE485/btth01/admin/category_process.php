<?php
include '../db.php'; // Kết nối cơ sở dữ liệu

// Truy vấn lấy danh sách the loai
$sql = "SELECT ma_tloai, ten_tloai FROM theloai";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị danh sách thể loại
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['ma_tloai']}</td>
                <td>{$row['ten_tloai']}</td>
                <td>
                    <a href='edit_category.php?id={$row['ma_tloai']}'><i class='fa-solid fa-pen-to-square'></i></a>
                </td>
                <td>
                    <a href='delete_category.php?id={$row['ma_tloai']}'><i class='fa-solid fa-trash'></i></a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>Không có thể loại nào.</td></tr>"; // Cập nhật colspan để phù hợp với số cột
}

$conn->close();
?>


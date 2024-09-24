<?php
include '../db.php';
 // Kết nối cơ sở dữ liệu

// Truy vấn lấy danh sách bài viết
$sql = "SELECT ma_tgia,ten_tgia
        FROM tacgia ";
       
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị danh sách bài viết
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
               
                <td>{$row['ma_tgia']}</td>
                <td>{$row['ten_tgia']}</td>
               
                <td>
                    <a href='edit_author.php?id={$row['ma_tgia']}'><i class='fa-solid fa-pen-to-square'></i></a>
                </td>
                <td>
                    <a href='delete_author.php?id={$row['ma_tgia']}'><i class='fa-solid fa-trash'></i></a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='9'>Không có bài viết nào.</td></tr>";
}

$conn->close();
?>

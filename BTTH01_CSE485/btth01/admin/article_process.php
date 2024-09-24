<?php
include '../db.php';
 // Kết nối cơ sở dữ liệu

// Truy vấn lấy danh sách bài viết
$sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, baiviet.tomtat, tacgia.ten_tgia, baiviet.ngayviet 
        FROM baiviet 
        JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai 
        JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hiển thị danh sách bài viết
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['tieude']}</td>
                <td>{$row['ten_bhat']}</td>
                <td>{$row['ten_tloai']}</td>
                <td>{$row['tomtat']}</td>
                <td>{$row['ten_tgia']}</td>
                <td>{$row['ngayviet']}</td>
                <td>
                    <a href='edit_article.php?id={$row['ma_bviet']}'><i class='fa-solid fa-pen-to-square'></i></a>
                </td>
                <td>
                    <a href='delete_article.php?id={$row['ma_bviet']}'><i class='fa-solid fa-trash'></i></a>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='9'>Không có bài viết nào.</td></tr>";
}

$conn->close();
?>

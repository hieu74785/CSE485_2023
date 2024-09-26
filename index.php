<?php
require_once 'controllers/AuthController.php';

// Xác định controller và action từ URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth'; // Mặc định là AuthController
$action = isset($_GET['action']) ? $_GET['action'] : 'index'; // Mặc định là phương thức index

// Chuẩn hóa tên controller
$controller = ucfirst($controller) . 'Controller';
$controllerPath = 'controllers/' . $controller . '.php';

// Kiểm tra sự tồn tại của file controller
if (!file_exists($controllerPath)) {
    die('Lỗi! Controller này không tồn tại');
}

// Nhúng controller
require_once($controllerPath);

// Tạo đối tượng của controller
$myObj = new $controller();

// Gọi phương thức tương ứng
if (method_exists($myObj, $action)) {
    $myObj->$action();
} else {
    die('Lỗi! Phương thức này không tồn tại');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/style_login.css"> <!-- Đảm bảo đường dẫn đúng -->
</head>
<body>
    <!-- Nội dung sẽ được nạp từ controller -->
</body>
</html>

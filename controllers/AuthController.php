<?php
require_once 'configs/DBConnection.php';

class AuthController {
    private $db;

    public function __construct() {
        $this->db = (new DBConnection())->getConnection(); // Tạo kết nối
    }

    public function index() {
        $this->views('login', []); // Hiển thị view đăng nhập
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Truy vấn cơ sở dữ liệu để kiểm tra thông tin đăng nhập
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password); // Nên mã hóa mật khẩu trước khi lưu trữ
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Đăng nhập thành công, chuyển hướng đến trang admin
                header("Location: views\admin\admin.php");
                exit();// Dừng thực hiện script sau khi chuyển hướng
            } else {
                echo "Thông tin đăng nhập không đúng!";
            }
        } else {
            echo "Yêu cầu không hợp lệ!";
        }
    }

    private function views($view, $data = []) {
        $file_path = "./views/" . $view . ".php";
        if (file_exists($file_path)) {
            require_once $file_path;
        } else {
            echo "File view không tồn tại: " . $file_path;
        }
    }
}
?>

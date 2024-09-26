<?php
class DBConnection {
    private $conn = null;
    private $host = '127.0.0.1';
    private $dbname = 'btth01_cse485'; // Tên cơ sở dữ liệu của bạn
    private $username = 'root'; // Tên đăng nhập cơ sở dữ liệu
    private $password = ''; // Mật khẩu cơ sở dữ liệu, thêm mật khẩu nếu có

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn; // Trả về đối tượng kết nối
    }
}
?>

// AuthorController.php
<?php
require_once '../config/database.php'; // Đảm bảo bao gồm file kết nối
require_once '../app/models/Author.php';

class AuthorController {
    private $authorModel;

    public function __construct($pdo) {
        $this->authorModel = new Author($pdo);
    }

    public function index() {
        $authors = $this->authorModel->getAllAuthors();
        include '../app/views/author_view.php'; // Gọi view để hiển thị
    }
}
?>

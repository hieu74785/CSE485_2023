<?php
require_once '../app/models/CategoryModel.php';

class CategoryController {
    private $conn;

    public function __construct($connection) {
        $this->conn = $connection; 
    }

    public function index() {
        $model = new CategoryModel($this->conn);
        $categories = $model->getAllCategories(); 
        require_once '../app/views/CategoryView.php';
    }

    public function add() {
        require_once '../app/views/addCategoryView.php';
    }

    public function processAdd() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['ten_tloai']);
            $model = new CategoryModel($this->conn);

            if ($model->createCategory($name)) {
                header('Location: index.php?page=category');
                exit();
            } else {
                echo "Có lỗi xảy ra khi thêm thể loại.";
            }
        }
    }

    public function edit($id) {
        $model = new CategoryModel($this->conn);
        $category = $model->getCategoryById($id); 
        require_once '../app/views/editCategoryView.php'; 
    }

    public function processEdit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['ten_tloai']);
            $model = new CategoryModel($this->conn);

            if ($model->updateCategory($id, $name)) {
                header('Location: index.php?page=category');
                exit();
            } else {
                echo "Có lỗi xảy ra trong quá trình cập nhật.";
            }
        }
    }

    public function delete($id) {
        $model = new CategoryModel($this->conn);
        
        if ($model->deleteCategoryById($id)) {
            header('Location: index.php?page=category');
        } else {
            echo "Thể loại đang được liên kết với một bài viết.";
        }
    }
}
?>
<?php
require_once '../config/db.php';
$conn = getDatabaseConnection();
require_once '../app/controllers/CategoryController.php';
$page = $_GET['page'] ?? 'category'; 
$categoryController = new CategoryController($conn);
switch ($page) {
    case 'category':
        $categoryController->index(); 
        break;
    case 'addCategoryView':
        $categoryController->add();
        break;
    case 'addCategory':
        $categoryController->processAdd();
        break;
    case 'editCategoryView':
        $categoryController->edit($_GET['id']); 
        break;
    case 'editCategory':
        $categoryController->processEdit($_GET['id']); 
        break;
    case 'deleteCategory':
        $categoryController->delete($_GET['id']); 
        break;
    default:
        echo "lỗi";
        break;
}
?>

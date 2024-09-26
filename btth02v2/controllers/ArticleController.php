<?php

require_once 'configs/database.php' ;
require_once 'models/ArticleModel.php';
    

class ArticleController {
    private $articleModel;

    public function __construct() {
        $this->articleModel = new ArticleModel();
    }

    public function index() {
        $articles = $this->articleModel->getAllArticles();
        require_once 'views/list_articles_view.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $this->articleModel->addArticle($title, $content);

            header('Location: index.php?controller=article&action=index');
            exit();
        }
        require_once 'views/article/add_article.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $content = $_POST['content'];

            $this->articleModel->updateArticle($id, $title, $content);

            header('Location: index.php?controller=article&action=index');
            exit();
        }

        $article = $this->articleModel->getArticleById($id);
        require_once 'views/edit_article_view.php';
    }

    public function delete($id) {
        $this->articleModel->deleteArticle($id);

        header('Location: index.php?controller=article&action=index');
        exit();
    }
}
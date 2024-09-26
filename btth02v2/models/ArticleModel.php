<?php
class Article {
    private $id;
    private $title;
    private $content;

    // Constructor
    public function __construct($title, $content, $id = null) {
        $this->title = $title;
        $this->content = $content;
        $this->id = $id;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setContent($content) {
        $this->content = $content;
    }
} 
?>
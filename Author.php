// Author.php
<?php
class Author {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllAuthors() {
        $stmt = $this->pdo->query("SELECT ma_tgia, ten_tgia FROM tacgia");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAuthor($name) {
        $stmt = $this->pdo->prepare("INSERT INTO tacgia (ten_tgia) VALUES (:name)");
        $stmt->execute(['name' => $name]);
    }

    public function editAuthor($id, $name) {
        $stmt = $this->pdo->prepare("UPDATE tacgia SET ten_tgia = :name WHERE ma_tgia = :id");
        $stmt->execute(['name' => $name, 'id' => $id]);
    }

    public function deleteAuthor($id) {
        $stmt = $this->pdo->prepare("DELETE FROM tacgia WHERE ma_tgia = :id");
        $stmt->execute(['id' => $id]);
    }

    public function getAuthorById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM tacgia WHERE ma_tgia = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>


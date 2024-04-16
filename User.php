<?php
include_once 'dbconfig.php';

class User {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function getAllUsers() {
        $stmt = $this->pdo->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addUser($name, $email) {
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
        $stmt->execute(['name' => $name, 'email' => $email]);
    }
}
?>

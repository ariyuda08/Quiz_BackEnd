<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'backend_task');
define('DB_USER', 'admintugas');
define('DB_PASS', 'ug224');

function connectToDatabase() {
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("ERROR: Could not connect to the database " . DB_NAME . ": " . $e->getMessage());
    }
}
?>

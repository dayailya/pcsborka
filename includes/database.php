<?php
$host = 'localhost';
$dbname = 'pc_parts';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения к базе данных: " . $e->getMessage();
    exit();
}
?>

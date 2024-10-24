<?php
$host = 'localhost';
$db = 'finance_tracker';
$user = 'root'; // Your MySQL username
$pass = '*7860Ss*'; // Your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

<?php
include_once 'config.php';

function registerUser($username, $password) {
    global $pdo;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    return $stmt->execute([$username, $hashedPassword]);
}

function loginUser($username, $password) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}

function addExpense($userId, $amount, $category, $description, $date) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO expenses (user_id, amount, category, description, date) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$userId, $amount, $category, $description, $date]);
}

function getUserExpenses($userId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM expenses WHERE user_id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteExpense($expenseId) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM expenses WHERE id = ?");
    return $stmt->execute([$expenseId]);
}

function getAllUsers() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM users");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllExpenses() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM expenses");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

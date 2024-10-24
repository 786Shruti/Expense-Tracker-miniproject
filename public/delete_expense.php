<?php
session_start();
include_once '../includes/functions.php'; // Corrected path
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $expenseId = $_GET['id'];
    deleteExpense($expenseId);
}

header('Location: dashboard.php');
exit;

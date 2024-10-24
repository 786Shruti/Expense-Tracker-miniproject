<?php
session_start();
include_once '../includes/functions.php'; // Corrected path

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id'];
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    if (addExpense($userId, $amount, $category, $description, $date)) {
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Failed to add expense!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Expense</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Adjusted path for CSS -->
</head>
<body>
    <div class="container">
        <h1>Add Expense</h1>
        <form method="POST" class="expense-form">
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" name="amount" id="amount" required placeholder="Amount">
            </div>
            <div class="form-group">
                <label for="category">Category:</label>
                <input type="text" name="category" id="category" required placeholder="Category">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" placeholder="Description"></textarea>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" required>
            </div>
            <button type="submit">Add Expense</button>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
        <a href="dashboard.php" class="back-link">Back to Dashboard</a>
    </div>
</body>
</html>

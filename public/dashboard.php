<?php
session_start();
include_once '../includes/functions.php'; // Corrected path

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$expenses = getUserExpenses($userId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Adjusted path for CSS -->
    <style>
        body {
            height: 100vh; /* Full height */
            margin: 0;
            font-family: Arial, sans-serif; /* Better font choice */
            background-image: url('dashboard.webp'); 
            background-size: cover; /* Cover the entire body */
            background-position: center; /* Center the background image */
            color: #fff; /* White text for better contrast */
        }
        h1, h2 {
            text-align: center; /* Centered headings */
            margin: 20px 0; /* Spacing */
        }
        a {
            display: inline-block; /* Inline-block for better spacing */
            margin: 10px 20px; /* Spacing between links */
            padding: 10px 20px; /* Padding for buttons */
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for links */
            color: #fff; /* White text color */
            text-decoration: none; /* Remove underline */
            border-radius: 5px; /* Rounded corners */
        }
        a:hover {
            background-color: rgba(0, 0, 0, 0.8); /* Darker background on hover */
        }
        table {
            width: 80%; /* Full width with some padding */
            margin: 20px auto; /* Center the table */
            border-collapse: collapse; /* Remove spacing between cells */
            background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background for the table */
        }
        th, td {
            padding: 10px; /* Padding inside table cells */
            border: 1px solid #fff; /* White borders */
            text-align: center; /* Centered text in cells */
        }
        th {
            background-color: rgba(255, 255, 255, 0.2); /* Lighter background for header */
        }
        button {
            background-color: red; /* Red color for delete account button */
            color: white; /* White text */
            border: none; /* No border */
            padding: 10px 15px; /* Padding */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor on hover */
        }
        button:hover {
            background-color: darkred; /* Darker red on hover */
        }
    </style>
</head>
<body>
    <h1>Welcome to Your Dashboard</h1>
    <a href="add_expense.php">Add Expense</a>
    <a href="logout.php">Logout</a> <!-- Logout option added -->
    <h2>Your Expenses</h2>
    
    <!-- Optional Delete User link -->
    <form action="delete_user.php" method="post" style="display:inline;">
        <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
        <button type="submit" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
    </form>

    <table>
        <tr>
            <th>Amount</th>
            <th>Category</th>
            <th>Description</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php if (empty($expenses)): ?>
            <tr>
                <td colspan="5">No expenses recorded.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($expenses as $expense): ?>
                <tr>
                    <td><?php echo htmlspecialchars($expense['amount']); ?></td>
                    <td><?php echo htmlspecialchars($expense['category']); ?></td>
                    <td><?php echo htmlspecialchars($expense['description']); ?></td>
                    <td><?php echo htmlspecialchars($expense['date']); ?></td>
                    <td><a href="delete_expense.php?id=<?php echo $expense['id']; ?>">Delete</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
</body>
</html>

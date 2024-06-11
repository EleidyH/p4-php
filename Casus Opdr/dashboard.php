<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <?php if ($role == 'roostermaker'): ?>
        <a href="add_report.php">Add Sick Report</a><br>
        <a href="view_reports.php">View Sick Reports</a>
    <?php elseif ($role == 'leerling'): ?>
        <a href="view_reports.php">View Sick Reports</a>
    <?php endif; ?>
</body>
</html>

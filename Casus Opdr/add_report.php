<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'roostermaker') {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_name = $_POST['teacher_name'];
    $date = $_POST['date'];
    $reason = $_POST['reason'];
    $added_by = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO sick_reports (teacher_name, date, reason, added_by) VALUES (:teacher_name, :date, :reason, :added_by)");
    $stmt->bindParam(':teacher_name', $teacher_name);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':reason', $reason);
    $stmt->bindParam(':added_by', $added_by);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Sick Report</title>
</head>
<body>
    <form method="POST" action="">
        <label for="teacher_name">Teacher Name:</label>
        <input type="text" name="teacher_name" required><br>
        <label for="date">Date:</label>
        <input type="date" name="date" required><br>
        <label for="reason">Reason:</label>
        <textarea name="reason" required></textarea><br>
        <button type="submit">Add Report</button>
    </form>
</body>
</html>

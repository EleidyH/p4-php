<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'roostermaker') {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM sick_reports WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$report = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_name = $_POST['teacher_name'];
    $date = $_POST['date'];
    $reason = $_POST['reason'];

    $stmt = $conn->prepare("UPDATE sick_reports SET teacher_name = :teacher_name, date = :date, reason = :reason WHERE id = :id");
    $stmt->bindParam(':teacher_name', $teacher_name);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':reason', $reason);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: view_reports.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Sick Report</title>
</head>
<body>
    <form method="POST" action="">
        <label for="teacher_name">Teacher Name:</label>
        <input type="text" name="teacher_name" value="<?php echo htmlspecialchars($report['teacher_name']); ?>" required><br>
        <label for="date">Date:</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($report['date']); ?>" required><br>
        <label for="reason">Reason:</label>
        <textarea name="reason" required><?php echo htmlspecialchars($report['reason']); ?></textarea><br>
        <button type="submit">Update Report</button>
    </form>
</body>
</html>

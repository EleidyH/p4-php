<?php
session_start();
include('config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$stmt = $conn->prepare("SELECT sick_reports.*, users.username AS added_by_username FROM sick_reports JOIN users ON sick_reports.added_by = users.id");
$stmt->execute();
$sick_reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Sick Reports</title>
</head>
<body>
    <h1>Sick Reports</h1>
    <table border="1">
        <tr>
            <th>Teacher Name</th>
            <th>Date</th>
            <th>Reason</th>
            <th>Added By</th>
            <?php if ($_SESSION['role'] == 'roostermaker'): ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>
        <?php foreach ($sick_reports as $report): ?>
            <tr>
                <td><?php echo htmlspecialchars($report['teacher_name']); ?></td>
                <td><?php echo htmlspecialchars($report['date']); ?></td>
                <td><?php echo htmlspecialchars($report['reason']); ?></td>
                <td><?php echo htmlspecialchars($report['added_by_username']); ?></td>
                <?php if ($_SESSION['role'] == 'roostermaker'): ?>
                    <td>
                        <a href="edit_report.php?id=<?php echo $report['id']; ?>">Edit</a>
                        <a href="delete_report.php?id=<?php echo $report['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
// toon_reacties.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gastenboek";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT naam, datum, bericht FROM reacties ORDER BY datum DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["naam"] . "</strong> <em>op " . $row["datum"] . "</em><br>" . $row["bericht"] . "</p>";
    }
} else {
    echo "Geen reacties gevonden.";
}

$conn->close();
?>

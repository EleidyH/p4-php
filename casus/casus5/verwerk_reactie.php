<?php
// verwerk_reactie.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gastenboek";
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$naam = $conn->real_escape_string($_POST['naam']);
$email = $conn->real_escape_string($_POST['email']);
$bericht = $conn->real_escape_string($_POST['bericht']);
 
// Scheldwoordenfilter
$scheldwoorden = ["kanker", "godverdomme", "Kut", "bitch", "fuck", "cunt", ""];
$bericht = str_ireplace($scheldwoorden, "***", $bericht);
 
// Tekstopmaak en smileys
$bericht = nl2br($bericht);
$bericht = preg_replace("/\[b\](.*?)\[\/b\]/", "<strong>$1</strong>", $bericht);
$bericht = preg_replace("/\[u\](.*?)\[\/u\]/", "<u>$1</u>", $bericht);
$bericht = preg_replace("/\[color=(.*?)\](.*?)\[\/color\]/", "<span style='color:$1'>$2</span>", $bericht);
$bericht = preg_replace("/\[size=(.*?)\](.*?)\[\/size\]/", "<span style='font-size:$1px'>$2</span>", $bericht);
$bericht = str_replace(":)", "<img src='Smiley.png' alt=':)' />", $bericht);
$bericht = str_replace(":(", "<img src='sad.png' alt=':(' />", $bericht);

// Prepare an SQL statement
$stmt = $conn->prepare("INSERT INTO reacties (naam, email, bericht) VALUES (?, ?, ?)");

// Bind the parameters to the SQL query
$stmt->bind_param("sss", $naam, $email, $bericht);

// Execute the statement
if ($stmt->execute()) {
    echo "Nieuwe reactie succesvol geplaatst.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect to index.php
header("Location: index.php");
exit();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistieken</title> 
</head>
<body>
    <h2>Statistieken Filteren</h2>
    <a href="index.php">Ga naar de homepagina</a>
    <form action="filter.php" method="get">
        <label for="month">Maand (1-12):</label>
        <input type="number" id="month" name="month" min="1" max="12">
        <br>
        <label for="country">Land:</label>
        <input type="text" id="country" name="country">
        <br>
        <input type="submit" value="Filteren">
    </form>
</body>
</html>
<?php
include 'db_connect.php';

// Functie om het land van de bezoeker te achterhalen
function get_country_by_ip($ip) {
    $json = @file_get_contents("http://ipinfo.io/{$ip}/json");
    if ($json === FALSE) {
        return 'Unknown';
    }
    $details = json_decode($json);
    return isset($details->country) ? $details->country : 'Unknown';
}

// Filteren op maand en land
$month = isset($_GET['month']) ? $_GET['month'] : '';
$country = isset($_GET['country']) ? $_GET['country'] : '';

// Bouw de SQL-query op basis van de filtercriteria
$sql = "SELECT * FROM bezoekers WHERE 1=1";
if (!empty($month)) {
    $sql .= " AND MONTH(datum_tijd) = $month";
}
if (!empty($country)) {
    $sql .= " AND land = '$country'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Land</th><th>IP-adres</th><th>Provider</th><th>Browser</th><th>Datum/Tijd</th><th>Referer</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["land"]."</td><td>".$row["ip_adres"]."</td><td>".$row["provider"]."</td><td>".$row["browser"]."</td><td>".$row["datum_tijd"]."</td><td>".$row["referer"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Geen resultaten gevonden";
}
$conn->close();
?>

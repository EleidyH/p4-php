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

$ip_adres = $_SERVER['REMOTE_ADDR'];
$land = get_country_by_ip($ip_adres);
$provider = gethostbyaddr($ip_adres);
$browser = $_SERVER['HTTP_USER_AGENT'];
$datum_tijd = date('Y-m-d H:i:s');
$referer = $_SERVER['HTTP_REFERER'] ?? '';

$sql = "INSERT INTO bezoekers (land, ip_adres, provider, browser, datum_tijd, referer)
VALUES ('$land', '$ip_adres', '$provider', '$browser', '$datum_tijd', '$referer')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

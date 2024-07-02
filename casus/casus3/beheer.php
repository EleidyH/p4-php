<?php
include 'db_connect.php';

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO bezoekers (land, ip_adres, provider, browser, datum_tijd, referer) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $land, $ip_adres, $provider, $browser, $datum_tijd, $referer);

// Sample data
$land = "Netherlands";
$ip_adres = "192.168.1.1";
$provider = "ProviderA";
$browser = "Chrome";
$datum_tijd = "2024-01-01 10:00:00";
$referer = "https://example.com";

// Execute the prepared statement
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>

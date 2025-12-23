<?php
require_once "../../../config.php";

header("Content-Type: application/json");

$res = mysqli_query($conn, "SELECT COUNT(*) AS totalVisitors FROM users");
$totalVisitors = mysqli_fetch_assoc($res)['totalVisitors'];

$visitorsByCountry = [];
$res = mysqli_query($conn, "SELECT paysOrigine AS country, COUNT(*) AS total FROM Animal GROUP BY paysOrigine");
while ($row = mysqli_fetch_assoc($res)) {
    $visitorsByCountry[] = $row;
}

$res = mysqli_query($conn, "SELECT COUNT(*) AS totalAnimals FROM Animal");
$totalAnimals = mysqli_fetch_assoc($res)['totalAnimals'];

echo json_encode([
    "totalVisitors" => $totalVisitors,
    "visitorsByCountry" => $visitorsByCountry,
    "totalAnimals" => $totalAnimals,
]);
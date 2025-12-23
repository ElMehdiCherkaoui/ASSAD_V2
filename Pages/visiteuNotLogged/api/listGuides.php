<?php
require_once "../../../config.php";
session_start();

header("Content-Type: application/json");




$sql = "SELECT * FROM visitesGuidees";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);

$Guides = [];

while ($row = mysqli_fetch_assoc($result)) {
    $Guides[] = $row;
}

echo json_encode($Guides);
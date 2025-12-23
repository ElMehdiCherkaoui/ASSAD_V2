<?php
require_once "../../../../config.php";

header("Content-Type: application/json");


$Name        = $_POST['Name'];
$type        = $_POST['type'];
$description = $_POST['description'];
$zone        = $_POST['zone'];

$sql = "INSERT INTO Habitats 
(habitatsName, typeClimat, descriptionHab, zoo_zone)
VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssss",
    $Name,
    $type,
    $description,
    $zone
);

$success = mysqli_stmt_execute($stmt);

echo json_encode(["success" => $success]);
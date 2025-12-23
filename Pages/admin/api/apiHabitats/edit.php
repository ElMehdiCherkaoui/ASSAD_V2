<?php
require_once "../../../../config.php";

header("Content-Type: application/json");



$id          = $_POST['id'];
$Name        = $_POST['Name'];
$type        = $_POST['type'];
$description = $_POST['description'];
$zone        = $_POST['zone'];

$sql = "UPDATE Habitats SET
            habitatsName = ?,
            descriptionHab = ?,
            typeClimat = ?,
            zoo_zone = ?
        WHERE Hab_id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssssi",
    $Name,
    $description,
    $type,
    $zone,
    $id
);

$success = mysqli_stmt_execute($stmt);

echo json_encode([
    "success" => $success
]);
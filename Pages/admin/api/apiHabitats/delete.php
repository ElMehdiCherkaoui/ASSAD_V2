<?php
require_once "../../../../config.php";
header("Content-Type: application/json");

$HabitatId = $_POST['id_Hab'];

$sql = "DELETE FROM Habitats WHERE Hab_id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $HabitatId);

$success = mysqli_stmt_execute($stmt);

echo json_encode([
    "success" => $success
]);
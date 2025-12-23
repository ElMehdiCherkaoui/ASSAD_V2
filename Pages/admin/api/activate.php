<?php
require_once "../../../config.php";

header("Content-Type: application/json");


$id = $_GET['id'];

$sql = "UPDATE users SET userStatus = 'Active' WHERE Users_id = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id);

$success = mysqli_stmt_execute($stmt);

echo json_encode(["success" => $success]);
<?php
require_once "../../../config.php";
header("Content-Type: application/json");
session_start();

$title    = $_POST['title'];
$date     = $_POST['date'];
$duration = $_POST['duration'];
$language = $_POST['language'];
$capacity = $_POST['capacity'];
$price    = $_POST['price'];
$Status   = $_POST['Status'];
$id       = $_SESSION["user_id"];

$sql = "INSERT INTO visitesGuidees 
(title, date_time, languages, max_capacity, duree, price, statut, user_guide_id)
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "sssiddsi",
    $title,
    $date,
    $language,
    $capacity,
    $duration,
    $price,
    $Status,
    $id
);

$success = mysqli_stmt_execute($stmt);

echo json_encode(["success" => $success]);
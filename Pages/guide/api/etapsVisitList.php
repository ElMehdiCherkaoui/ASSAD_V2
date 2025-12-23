<?php
require_once "../../../config.php";
session_start();

header("Content-Type: application/json");

if (empty($_POST['id_visit'])) {
    echo json_encode([]);
    exit;
}

$id_visit = $_POST['id_visit'];

$sql = "SELECT * FROM etapesvisite WHERE guid_tour_id = ? ORDER BY step_order";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $id_visit);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$etapes = [];

while ($row = mysqli_fetch_assoc($result)) {
    $etapes[] = $row;
}

echo json_encode($etapes);
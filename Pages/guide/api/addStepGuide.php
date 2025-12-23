<?php
require_once "../../../config.php";
header("Content-Type: application/json");

$id_visit = $_POST['IdGuideNeeded'];
$stepOrder = $_POST['stepOrder'];
$stepTitle = $_POST['stepTitle'];
$stepDescription = $_POST['stepDescription'];


$sql = "INSERT INTO etapesvisite (guid_tour_id, step_order, step_title, step_description) 
        VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "iiss", $id_visit, $stepOrder, $stepTitle, $stepDescription);


if (mysqli_stmt_execute($stmt)) {
    echo json_encode(["success" => true, "message" => "Étape added successfully"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to add étape"]);
}
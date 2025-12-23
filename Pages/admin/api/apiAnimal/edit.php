<?php
require_once "../../../../config.php";
header("Content-Type: application/json");


$animalId     = $_POST['Ani_id'];
$animalName   = $_POST['animalName'];
$espece       = $_POST['espèce'];
$alimentation = $_POST['alimentation'];
$habitatId    = $_POST['Habitat_ID'];
$paysOrigine  = $_POST['paysOrigine'];
$image        = $_POST['Image'] ?? null;
$description  = $_POST['descriptionCourte'] ?? null;

$sql = "UPDATE Animal SET
            animalName = ?,
            espèce = ?,
            alimentation = ?,
            Image = ?,
            paysOrigine = ?,
            descriptionCourte = ?,
            Habitat_ID = ?
        WHERE Ani_id = ?";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssssssii",
    $animalName,
    $espece,
    $alimentation,
    $image,
    $paysOrigine,
    $description,
    $habitatId,
    $animalId
);

$success = mysqli_stmt_execute($stmt);

echo json_encode([
    "success" => $success
]);
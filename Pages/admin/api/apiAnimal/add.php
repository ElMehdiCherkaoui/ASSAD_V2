<?php
require_once "../../../../config.php";
header("Content-Type: application/json");

$animalName   = $_POST['animalName'];
$espece       = $_POST['espèce'];
$alimentation = $_POST['alimentation'];
$habitatId    = $_POST['Habitat_ID'];
$paysOrigine  = $_POST['paysOrigine'];
$image        = $_POST['Image'] ?? null;
$description  = $_POST['descriptionCourte'] ?? null;

$sql = "INSERT INTO Animal 
(animalName, espèce, alimentation, Image, paysOrigine, descriptionCourte, Habitat_ID)
VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param(
    $stmt,
    "ssssssi",
    $animalName,
    $espece,
    $alimentation,
    $image,
    $paysOrigine,
    $description,
    $habitatId
);

$success = mysqli_stmt_execute($stmt);

echo json_encode([
    "success" => $success
]);
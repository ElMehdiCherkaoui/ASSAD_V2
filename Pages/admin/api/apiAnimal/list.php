<?php
require_once "../../../../config.php";

header("Content-Type: application/json");

$sql = "SELECT 
            a.Ani_id,
            a.animalName,
            a.espèce,
            a.alimentation,
            a.paysOrigine,
            a.Image,
            a.descriptionCourte,
            h.habitatsName
        FROM Animal a
        LEFT JOIN Habitats h ON a.Habitat_ID = h.Hab_id";

$result = mysqli_query($conn, $sql);

$animals = [];

while ($row = mysqli_fetch_assoc($result)) {
    $animals[] = $row;
}

echo json_encode($animals);
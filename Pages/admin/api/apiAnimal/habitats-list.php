<?php
require_once "../../../../config.php";

header("Content-Type: application/json");

$sql = "SELECT 
            Hab_id,
            habitatsName
        FROM Habitats";

$result = mysqli_query($conn, $sql);

$Habitats = [];

while ($row = mysqli_fetch_assoc($result)) {
    $Habitats[] = $row;
}

echo json_encode($Habitats);
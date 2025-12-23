<?php
require_once "../../../../config.php";

header("Content-Type: application/json");

$sql = "SELECT * FROM Habitats";

$result = mysqli_query($conn, $sql);

$habitats = [];

while ($row = mysqli_fetch_assoc($result)) {
    $habitats[] = $row;
}

echo json_encode($habitats);
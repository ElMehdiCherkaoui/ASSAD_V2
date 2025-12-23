<?php
require_once "../../../config.php";
session_start();
header("Content-Type: application/json");

$guideId = $_SESSION["user_id"];

$sql = "
SELECT 
*
FROM userReservations r
JOIN visitesGuidees g
    ON r.tour_id_reservation_fk = g.guided_id
JOIN users u
    ON r.user_id_reservation_fk = u.Users_id
WHERE g.user_guide_id = ?
";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $guideId);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$reservations = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reservations[] = $row;
}

echo json_encode($reservations);
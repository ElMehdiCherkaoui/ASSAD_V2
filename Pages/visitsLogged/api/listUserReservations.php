<?php
require_once "../../../config.php";
session_start();

$userId = $_SESSION['user_id'];

$sql = "SELECT *
FROM userReservations ur
LEFT JOIN visitesGuidees vg
    ON ur.tour_id_reservation_fk = vg.guided_id
WHERE ur.user_id_reservation_fk = $userId";

$result = mysqli_query($conn, $sql);

$reservations = [];

while ($row = mysqli_fetch_assoc($result)) {
    $reservations[] = $row;
}

echo json_encode($reservations);
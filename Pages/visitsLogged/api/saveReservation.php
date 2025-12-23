<?php
require_once "../../../config.php";
session_start();

$guide_id = $_POST['guide_id'];
$people = $_POST['people'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO userReservations 
(tour_id_reservation_fk, user_id_reservation_fk, number_of_people, reservation_date)
VALUES (?, ?, ?, NOW())";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "iii", $guide_id, $user_id, $people);
mysqli_stmt_execute($stmt);

header("Location: ../animalsLogged.php");
exit;
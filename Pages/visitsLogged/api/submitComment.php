<?php
session_start();
require_once "../../../config.php";

header("Content-Type: application/json");

$user_id = $_SESSION['user_id'];
$tour_id = $_POST['reservation_id'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];


$success = mysqli_query($conn, "
    INSERT INTO userComments (tours_id_comment_fk, user_id_comment_fk, rating, text_desc)
    VALUES ($tour_id, $user_id, $rating, '$comment')
");


echo json_encode([
    "success" => $success ? true : false
]);
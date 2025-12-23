<?php
require_once "../../../config.php";

header("Content-Type: application/json");

$sql = "SELECT 
            Users_id,
            userName,
            userEmail,
            userRole,
            userStatus
        FROM users";

$result = mysqli_query($conn, $sql);

$users = [];

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

echo json_encode($users);
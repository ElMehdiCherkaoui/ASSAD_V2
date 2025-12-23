<?php
require_once "../config.php";

$error = "";


$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$role = $_POST["role"];
$password = $_POST["password"];

if (empty($name) || empty($email) || empty($role) || empty($password)) {
    $error = "All fields are required";
} else {

    $check = mysqli_prepare($conn, "SELECT Users_id FROM users WHERE userEmail = ?");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    $result = mysqli_stmt_get_result($check);

    if (mysqli_num_rows($result) > 0) {
        $error = "Email already exists";
    } else {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $status = ($role === "Guide") ? "Pending" : "Active";

        $stmt = mysqli_prepare($conn, "
                INSERT INTO users (userName, userEmail, userRole, password_hash, userStatus)
                VALUES (?, ?, ?, ?, ?)
            ");

        mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $role, $hashedPassword, $status);
        mysqli_stmt_execute($stmt);

        header("Location: login.php");
        exit;
    }
}

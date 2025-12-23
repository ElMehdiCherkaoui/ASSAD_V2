<?php
require_once "../config.php";
session_start();

$error = "";

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $error = "All fields are required";
    } else {

        $sql = "SELECT Users_id, userName, userRole, password_hash, userStatus 
                FROM users 
                WHERE userEmail = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if (!$user || !password_verify($password, $user["password_hash"])) {
            $error = "Invalid email or password";
        } else {

            if ($user["userRole"] === "Guide" && $user["userStatus"] === "Pending") {
                header("Location: guide/guide-pending.php");
                exit;
            }

            if (($user["userRole"] === "Visitor" && $user["userStatus"] === "Disabled") ||
                ($user["userRole"] === "Guide" && $user["userStatus"] === "Disabled")) {
                header("Location: visitsLogged/DesactivePage.php");
                exit;
            }

            $_SESSION["user_id"] = $user["Users_id"];
            $_SESSION["user_name"] = $user["userName"];
            $_SESSION["user_role"] = $user["userRole"];

            if ($user["userRole"] === "Admin") {
                header("Location: admin/dashboard.php");
            } elseif ($user["userRole"] === "Guide") {
                header("Location: guide/dashboard.php");
            } else {
                header("Location: visitsLogged/animalsLogged.php");
            }
            exit;
        }
    }

?>
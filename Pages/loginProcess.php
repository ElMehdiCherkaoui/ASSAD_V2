<?php
require_once "../config.php";
session_start();

$error = "";

class login
{
    private $email;
    private $password;
    function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
    function checkUser()
    {
        $database = new Database();
        $db = $database->getConnection();
        if (empty($this->email) || empty($this->password)) {
            return "All fields are required";
        } else {
            $sql = "SELECT Users_id, userName, userRole, password_hash, userStatus 
          FROM users 
           WHERE userEmail = :email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":email", $this->email);
            $result = $stmt->execute();
            $user = $stmt->fetchObject();

            if (!$result || !password_verify($this->password, $user->password_hash)) {
                return "Invalid email or password";
            } else {
                if ($user->userRole === "Guide" && $user->userStatus === "Pending") {
                    header("Location: guide/guide-pending.php");
                    exit;
                }
                if (($user->userRole === "Visitor" && $user->userStatus === "Disabled") ||
                    ($user->userRole === "Guide" && $user->userStatus === "Disabled")
                ) {
                    header("Location: visitsLogged/DesactivePage.php");
                    exit;
                }
                $_SESSION["user_id"] = $user->Users_id;
                $_SESSION["user_name"] = $user->userName;
                $_SESSION["user_role"] = $user->userRole;

                if ($user->userRole === "Admin") {
                    header("Location: admin/dashboard.php");
                } elseif ($user->userRole === "Guide") {
                    header("Location: guide/dashboard.php");
                } else {
                    header("Location: visitsLogged/animalsLogged.php");
                }
                exit;
            }
        }
    }
}

$checkUser = new login(trim($_POST["email"]), $_POST["password"]);
$checking = $checkUser->checkUser();
if ($checking) {
    $error = $checking;
    header("Location: login.php?error=$error");
}

<?php
require_once '../models/VisitNotLogged.php';


class ControleLogin
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function controlleLogin()
    {
        session_start();
        if (empty($this->email) || empty($this->password)) {
            return "All fields are required";
        }

        $login = new VisitNotLogged();
        $attr = $login->login($this->email);

        if (!$attr || !password_verify($this->password, $attr->password_hash)) {
            return "Invalid email or password";
        }

        if ($attr->userRole === "Guide" && $attr->userStatus === "Pending") {
            header("Location: ../Pages/guide/guide-pending.php");
            exit;
        }

        if (
            ($attr->userRole === "Visitor" && $attr->userStatus === "Disabled") ||
            ($attr->userRole === "Guide" && $attr->userStatus === "Disabled")
        ) {
            header("Location: ../Pages/visitsLogged/DesactivePage.php");
            exit;
        }

        $_SESSION["user_id"] = $attr->Users_id;
        $_SESSION["user_name"] = $attr->userName;
        $_SESSION["user_role"] = $attr->userRole;

        if ($attr->userRole === "Admin") {
            header("Location: ../Pages/admin/dashboard.php");
        } elseif ($attr->userRole === "Guide") {
            header("Location: ../Pages/guide/dashboard.php");
        } else {
            header("Location: ../Pages/visitsLogged/animalsLogged.php");
        }
    }
}


$loginControl = new ControleLogin($_POST["email"], $_POST["password"]);
$error = $loginControl->controlleLogin();

if ($error) {
    header("Location: ../Pages/login.php?error=$error");
    exit;
}
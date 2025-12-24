<?php
require_once '../models/VisitNotLogged.php';

class ControleRegister
{
    public function CheckEmail($email)
    {
        $database = new Database();
        $db = $database->getConnection();

        $check = $db->prepare("SELECT Users_id FROM users WHERE userEmail = :email");
        $check->bindParam(":email", $email);
        $check->execute();
        $results_array = $check->fetchAll();

        return count($results_array);
    }

    public function Register($name, $email, $role, $password)
    {
        $status = ($role === "Guide") ? "Pending" : "Active";

        if ($this->CheckEmail($email) > 0) {
            return "Email duplicated";
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $register = new VisitNotLogged();
        $user = $register->register($name, $email, $role, $passwordHash, $status);

        if ($user) {
            header("Location: ../Pages/login.php");
            exit;
        } else {
            return "Fatal error";
        }
    }
}

$registerControl = new ControleRegister();
$error = $registerControl->Register(trim($_POST["name"]), trim($_POST["email"]), $_POST["role"], $_POST["password"]);

if ($error) {
    header("Location: ../Pages/register.php?error=$error");
    exit;
}
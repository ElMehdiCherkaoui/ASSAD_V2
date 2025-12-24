<?php
require_once 'Users.php';
require_once '../config.php';

class VisitNotLogged extends User
{
    public function __construct($idUser = null, $name = null, $email = null, $role = null, $password = null, $status = null)
    {
        parent::__construct($idUser, $name, $email, $role, $password, $status);
    }

    public function login($email)
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT Users_id, userName, userRole, password_hash, userStatus
                FROM users
                WHERE userEmail = :email";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        return $stmt->fetchObject();
    }
    public function register(){
        
    }
}
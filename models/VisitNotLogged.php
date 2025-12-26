<?php
require_once 'Users.php';
require_once '../config.php';

class VisitNotLogged extends User
{
    public function __construct($idUser = null, $name = null, $email = null, $role = null, $password = null, $status = null)
    {
        parent::__construct($idUser, $name, $email, $role, $password, $status);
    }

    public function __toString(): string
    {
        return "User (ID: {$this->idUser}, Name: {$this->name}, Email: {$this->email}, Role: {$this->role}, Status: {$this->status})";
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
    public function register($name, $email, $role, $password, $status)
    {
        $database = new Database();
        $db = $database->getConnection();
        $sql = " INSERT INTO users (userName, userEmail, userRole, password_hash, userStatus)
                VALUES (:name, :email, :role, :password, :status) ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":role", $role);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":status", $status);
        $stmt->execute();
        return "success";
    }
}

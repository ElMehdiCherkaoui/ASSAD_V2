<?php
class User
{
    private  $idUser;
    private  $name;
    private  $email;
    private  $role;
    private  $password;
    private  $status;

    public function __construct($idUser = null, $name = null, $email = null, $role = null, $password = null, $status = null)
    {
        $this->idUser = $idUser;
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
        $this->status = $status;
    }
    public function __get($name)
    {
        return $this->$name;
    }
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __toString()
    {
        return "User (ID: {$this->idUser}, Name: {$this->name}, Email: {$this->email}, Role: {$this->role}, Status: {$this->status})";
    }


    function listAllUsers()
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT 
         * FROM users WHERE userRole != 'Admin'";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    function logout()
    {
        session_start();
        session_unset();
        session_destroy();
    }

    public function activeUser(int $userId): bool
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "UPDATE users SET userStatus = 'Active' WHERE Users_id = :idUser";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':idUser', $userId);

        return $stmt->execute();
    }

    public function DisableUser(int $userId): bool
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "UPDATE users SET userStatus = 'Disabled' WHERE Users_id = :idUser";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':idUser', $userId);

        return $stmt->execute();
    }

    public function approveGuide(int $userId): bool
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "UPDATE users SET userStatus = 'Active' WHERE Users_id = :idUser";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':idUser', $userId);

        return $stmt->execute();
    }
}
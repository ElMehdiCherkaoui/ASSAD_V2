<?php
class User
{
    private int $idUser;
    private string $name;
    private string $email;
    private string $role;
    private string $password;
    private string $status;

    public function __construct($idUser = null, $name = null, $email = null, $role = null, $password = null, $status = null)
    {
        $this->idUser = $idUser;
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
        $this->password = $password;
        $this->status = $status;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
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
        *SELECT * FROM users WHERE userRole != 'Admin'";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
<?php
require_once 'Users.php';
class Admin extends User
{

    public function __construct($idUser = null, $name = null, $email = null, $role = null, $password = null, $status = null)
    {
        parent::__construct($idUser, $name, $email, $role, $password, $status);
    }
    function listAllUsers()
    {
        $database = new Database();
        $db = $database->getConnection();

        $sql = "SELECT 
        Users_id,
        userName,
        userEmail,
        userRole,
        userStatus
    FROM users";
        $stmt = $db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function changeStatus($userId, $statusChangee)
    {
        $database = new Database();
        $db = $database->getConnection();


        $sql = "UPDATE users SET userStatus = :idStatus WHERE Users_id = :idUser";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(":idUser", $userId);
        $stmt->bindParam(":idStatus", $statusChangee);
        return $stmt->execute();
    }
}

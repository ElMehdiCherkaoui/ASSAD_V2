<?php
require_once 'Users.php';
class Admin extends User
{

    public function __construct($idUser = null, $name = null, $email = null, $role = null, $password = null)
    {
        parent::__construct($idUser, $name, $email, $role, $password);
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
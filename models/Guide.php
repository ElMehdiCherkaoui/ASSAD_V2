<?php
require_once 'Users.php';
class Guide extends User{
    public function __construct($name, $email, $role, $password, $status)
    {
        parent::__construct($name, $email, $role, $password, $status);
    }

    
}
?>
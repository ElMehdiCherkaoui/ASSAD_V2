<?php
require_once 'Users.php';
class Admin extends User{
    public function __construct($name, $email, $role, $password, $status)
    {
        parent::__construct($name, $email, $role, $password, $status);
    }

    
}
?>
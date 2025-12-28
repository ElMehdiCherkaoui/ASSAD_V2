<?php
require_once 'Users.php';
class Admin extends User
{

    public function __construct($idUser = null, $name = null, $email = null, $role = null, $password = null)
    {
        parent::__construct($idUser, $name, $email, $role, $password);
    }

    public function __toString(): string
    {
        return "Admin (ID: {$this->idUser}, Name: {$this->name}, Email: {$this->email}, Role: {$this->role})";
    }
    


}
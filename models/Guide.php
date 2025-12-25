<?php
require_once 'Users.php';
class Guide extends User
{
    public function __construct($name, $email, $role, $password, $status)
    {
        parent::__construct($name, $email, $role, $password, $status);
    }

    public function __toString()
    {
        return "Guide (ID: {$this->getIdUser()}, Name: {$this->getName()}, Email: {$this->getEmail()}, Role: {$this->getRole()}, Status: {$this->getStatus()})";
    }
}
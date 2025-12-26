<?php
require_once 'Users.php';
class Guide extends User
{
    public function __construct($name, $email, $role, $password, $status)
    {
        parent::__construct($name, $email, $role, $password, $status);
    }

    public function __toString(): string
    {
        return "Guide (ID: {$this->idUser}, Name: {$this->name}, Email: {$this->email}, Role: {$this->role}, Status: {$this->status})";
    }


}
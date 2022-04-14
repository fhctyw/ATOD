<?php

class User
{
    public $email, $password;
    protected $id;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }
}
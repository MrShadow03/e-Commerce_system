<?php

namespace App\Includes;

class SignUpCntr
{
    private $name;
    private $email;
    private $phone;
    private $password;
    private $confirm_password;

    public function __construct($name, $email, $phone, $password, $confirm_password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
    }
    public function signUpUser()
    {
        if ($this->notEmptyCheck() == false) {
            echo "Error! Empty field/s detected1";
        }
    }
    public function notEmptyCheck()
    {
        if (empty($this->name) || empty($this->email) || empty($this->phone) || empty($this->password) || empty($this->confirm_password)) {
            return false;
        } else {
            return true;
        }
    }
}

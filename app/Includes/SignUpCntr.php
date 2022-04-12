<?php

namespace App\Includes;

use App\Controller\SignUpDb;

class SignUpCntr extends SignUpDb
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
    private function alert($type, $message)
    {
        return '<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
                <strong>Error!</strong> ' . $message . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
    }
    public function signUpUser()
    {
        if ($this->notEmptyCheck() == false) {
            return $alert = $this->alert('danger', 'Empty field.');
        } elseif ($this->emailCheck() == false) {
            if ($this->existsEmail($this->email) == true) {
                return $alert = $this->alert('danger', 'Email is already associated with an account. Try to login.');
            } else {
                return $alert = $this->alert('danger', 'Invalid Email.');
            }
        } elseif ($this->passwordCheck() == false) {
            if ($this->password != $this->confirm_password) {
                return $alert = $this->alert('danger', 'Passwords doesn\'t match.');
            } elseif (strlen($this->password) < 8) {
                return $alert = $this->alert('danger', 'Passwords must be at least 8 character long.');
            }
        } else {
            $this->dataInsert($this->name, $this->email, $this->phone, $this->password);
            return $alert = '<div class="alert alert-' . $type = 'success' . ' alert-dismissible" role="alert">
                <strong>Congrats!</strong> ' . $message = 'Submitted Successfully. Try to sign in.' . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>';
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
    public function emailCheck()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) || $this->existsEmail($this->email) == true) {
            return false;
        } else {
            return true;
        }
    }
    public function passwordCheck()
    {
        if ($this->password != $this->confirm_password || strlen($this->password) < 8) {
            return false;
        } else {
            return true;
        }
    }
}

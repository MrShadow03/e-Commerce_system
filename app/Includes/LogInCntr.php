<?php

namespace App\Includes;

use App\Controller\LogInDb;

class LogInCntr extends LogInDb
{
    private $login_email;
    private $login_password;


    public function __construct($login_email, $login_password){
      $this->login_email = $login_email;
      $this->login_password = $login_password;
    }
    public function loginUser(){

       if($this->notEmptyCheck()==false){
         return $this->alert('danger','Inputs can not be empty.');
       }elseif($this->emailCheck()==false){
         return $this->alert('danger','Invalid email.');
       }else{
          $login_check=$this->loginCheck($this->login_email, $this->login_password);
          if($login_check==false){
             return $this->alert('danger','Incorrect email or password.');
          }elseif($login_check==true){
             header('Location:index.php');
          }
       }
    }
    public function notEmptyCheck()
    {
        if (empty($this->login_email) || empty($this->login_password)) {
            return false;
        } else {
            return true;
        }
    }
    public function emailCheck()
    {
        if (!filter_var($this->login_email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
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

    
}

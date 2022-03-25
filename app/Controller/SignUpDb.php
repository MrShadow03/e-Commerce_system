<?php

namespace App\Controller;

use App\Includes\Database;

class SignUpDb extends Database {

   public function dataInsert($name, $email, $phone, $password){

      $this->connection()->query("INSERT INTO customer(name, email, phone, password) VALUES('$name', '$email', '$phone', '$password')");

   }
   protected function existsEmail($email){
      $exists = $this->connection()->query("SELECT * FROM customer WHERE email = '$email'");

      if($exists->num_rows > 0){
         return true;
      }else{
         return false;
      }
   }
}
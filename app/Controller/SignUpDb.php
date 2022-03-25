<?php

namespace App\Controller;

use App\Includes\Database;

class SignUpDb extends Database {

   public function dataInsert($name, $email, $phone, $password){

      $this->connection()->query("INSERT INTO customer(name, email, phone, password) VALUES('$name', '$email', '$phone', '$password')");

   }
}
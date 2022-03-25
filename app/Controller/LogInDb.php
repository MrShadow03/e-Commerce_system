<?php

namespace App\Controller;

use App\Includes\Database;

class LogInDb extends Database {
   protected function loginCheck($email, $password){
      $row_check = $this->connection()->query("SELECT * FROM customer Where email='$email' && password='$password'");

      if($row_check->num_rows > 0){
         return true;
      }else{
         return false;
      }
   }   
}
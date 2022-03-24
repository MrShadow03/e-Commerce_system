<?php

namespace App\Includes;

class Database
{
    private $host = 'localhost';
    private $name = 'root';
    private $password = '';
    private $db_name = 'ecommerce';

    private function connection()
    {
        return $connection = new mysqli($this->host, $this->name, $this->password, $this->db_name);
    }
}

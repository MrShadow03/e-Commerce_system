<?php

namespace App\Includes;

use mysqli;
use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $name = 'root';
    private $password = '';
    private $db_name = 'ecommerce';

    protected function connection()
    {
        $connection = new mysqli($this->host, $this->name, $this->password, $this->db_name);
        return $connection;

    }
}

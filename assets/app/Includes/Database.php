<?php

class Database
{
    private $host = 'localhost';
    private $name = 'root';
    private $password = '';
    private $db_name = 'ecommerce';

    public function createDb()
    {
        return $connection = new mysqli($this->host, $this->name, $this->password, $this->db_name);
    }
}

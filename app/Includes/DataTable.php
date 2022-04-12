<?php

namespace App\Includes;


class DataTable extends Database
{
    public function tableData()
    {
        $sql = "SELECT * FROM customer";
        $table_data = $this->connection()->query($sql);
        return $table_data;
    }
}

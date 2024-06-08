<?php


class Db
{
    protected $connection;

    function __construct()
    {
        $this->start_db();
    }

    private function start_db()
    {
        $this->connection = mysqli_connect("localhost:8889", "root", "root", "party_lovers");
        if (!$this->connection) {
            echo "failed to connect";
        }
    }

    public function query($sql)
    {
        return mysqli_query($sql ,$this->connection);
    }
} // end of  class

$database = new Db();

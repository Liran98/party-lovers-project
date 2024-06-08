<?php


class Db
{
    public $db;

    function __construct()
    {
        $this->start_db();
    }

    private function start_db()
    {
        $this->db = mysqli_connect("localhost:8889", "root", "root", "party_lovers");
        $this->confirm_query($this->db);
    }

    public function query($sql)
    {
        $res = mysqli_query($this->db, $sql);
        $this->confirm_query($res);
        return $res;
    }

    protected function confirm_query($result)
    {
        if (!$result) {
            return die(mysqli_error($this->db));
        }
    }
} // end of  class

$database = new Db();

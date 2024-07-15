<?php
require __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
class Db
{
    public $db;

    function __construct()
    {


        $this->start_db();
    }

    private function start_db()
    {


        $host = $_ENV['DB_HOST'];
        $pass = $_ENV['DB_PASSWORD'];
        $user = $_ENV['DB_USER'];
        $name = $_ENV['DB_NAME'];

        $this->db = mysqli_connect($host, $user, $pass, $name);
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
            die(mysqli_error($this->db) . strtoupper(" <strong>💥Something went wrong in your code , try again💥</strong>"));
        }
    }

    public function inserted_id()
    {
        return mysqli_insert_id($this->db);
    }
} // end of  class

$database = new Db();

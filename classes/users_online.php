<?php


class Online extends Db_object
{

    public static $table = "users_online";
    public static $db_fields = ['session', 'time'];

    public $id;
    public $session;
    public $time;


    public function get_user_session()
    {
        global $database;
        $sql = "SELECT * FROM " . self::$table . " WHERE session = '$this->session'";
        $res = $database->query($sql);
        return mysqli_num_rows($res);
    }

    public function users_online_query($timeout)
    {
        global $database;
        $sql = "SELECT * FROM " . self::$table . " WHERE time > '$timeout'";
        $res = $database->query($sql);
        return mysqli_num_rows($res);
    }

    public function update_timer()
    {
        global $database;
        $sql =  "UPDATE " . self::$table . " SET time = '$this->time' WHERE session = '$this->session'";
        $res = $database->query($sql);
        return $res;
    }
}

$online = new Online();

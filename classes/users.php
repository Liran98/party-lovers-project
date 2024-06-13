<?php


class User extends Db_object
{
    static $table = 'users';
    static $db_fields = ['username', 'email', 'password'];

    public $username;
    public $password;
    public $email;

    public $loggedIn = false;

    public function login()
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE username = '$this->username' AND password = '$this->password'";
        $res = static::find_query($sql);

        if ($res) {
            $this->loggedIn = true;
            redirect("admin/index");
        }else{
            return false;
        }
    }



} // end of class user


$user = new User();

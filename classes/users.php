<?php


class User extends Db_object
{
    static $table = 'users';
    static $db_fields = ['username', 'email', 'password', 'user_role'];

    public $id;
    public $username;
    public $password;
    public $email;
    public $user_role;


    public function verify_user($username)
    {

        $sql = "SELECT * FROM " . self::$table . " WHERE username = '$username'";
        $res_array = static::find_query($sql);
        return  !empty($res_array) ? array_shift($res_array) : false;
    }



    public function count_users_role($role)
    {
        global $database;
        $sql = "SELECT * FROM " . self::$table . " WHERE user_role = '$role'";

        $res = $database->query($sql);

        return mysqli_num_rows($res);
    }
} // end of class user


$user = new User();

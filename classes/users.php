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


    public function verify_user($username,$password)
    {

        $sql = "SELECT * FROM " . self::$table . " WHERE username = '$username' AND password = '$password'";
       return  static::find_query($sql);
   
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

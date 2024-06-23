<?php


class User extends Db_object
{
    static $table = 'users';
    static $db_fields = ['username', 'email', 'password'.'user_role'];

    public $id;
    public $username;
    public $password;
    public $email;
    public $user_role;


    public $LoggedIn = false;


    function __construct(){

        session_start();
        $this->session();

    }


    public function login()
    {
        $sql = "SELECT * FROM " . self::$table . " WHERE username = '$this->username' AND password = '$this->password'";
        $res = static::find_query($sql);

        if ($res) {
            $this->LoggedIn = true;
            redirect("admin/index");
        } else {
            return false;
        }
    }

    public function session(){
        if($this->LoggedIn){
           $_SESSION['username'] = $this->username;
        }
    }
  
} // end of class user


$user = new User();

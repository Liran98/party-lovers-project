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


    public function verify_user()
    {


        $sql = "SELECT * FROM " . self::$table . " WHERE username = '$this->username' AND password = '$this->password'";
        $res = static::find_query($sql);

        if ($res) {
            $_SESSION['id'] = $this->id;
            $_SESSION['email'] = $this->email;
            $_SESSION['user_role'] = $this->user_role;
            $_SESSION['username'] = $this->username;

            redirect("admin/index");
        }else{
            echo "<p class='text-center bg-danger' >Invalid Credentials</p>";
        }
    }

    public function logout()
    {
        unset($_SESSION['email']);
        unset($_SESSION['username']);
        unset($_SESSION['user_role']);
        unset($_SESSION['id']);
        redirect("../index");
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

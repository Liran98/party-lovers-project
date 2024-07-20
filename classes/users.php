<?php


class User extends Db_object
{
    static $table = 'users';
    static $db_fields = ['username', 'email', 'password', 'user_role','user_image'];

    public $id;
    public $username;
    public $password;
    public $email;
    public $user_role;

    public $user_image;

    public function verify_user($username, $email="")
    {

        $sql = "SELECT * FROM " . self::$table . " WHERE username = '$username' OR email = '$email'";
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

    public function delete_user_carts($id)
    {
        global $database;
        if ($this->delete($id)) {
            $sql = "DELETE FROM cart WHERE user_id = $id";
           return  $database->query($sql);
        }
    }

    public function set_file($file)
    {
        $this->user_image = $file['name'];

        $this->tmp_path = $file['tmp_name'];

        $path_for_img = IMG_PATH . DS . $this->user_image;

       if (move_uploaded_file($this->tmp_path, $path_for_img)) {
            unset($this->tmp_path);
            return true;
        };
    }

    public function img_path()
    {
        return $this->file_directory . DS . $this->user_image;
    }

    

} // end of class user


$user = new User();

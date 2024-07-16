<?php

class Cart extends Db_object
{
    public static $table = "cart";
    public static $db_fields = ['name', 'description', 'total_price', 'package_selected_id', 'cart_image', 'user_id'];

    public $id;
    public $name;
    public $description;
    public $total_price;
    public $package_selected_id;
    public $cart_image;
    public $user_id;



    public function find_user_carts($uid)
    {
        global $database;
        $sql = "SELECT * FROM cart WHERE user_id = $uid";
        $res = $database->query($sql);

        return mysqli_num_rows($res);
    }
} //end of class cart


$cart = new Cart();

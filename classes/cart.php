<?php

class Cart extends Db_object
{
    public static $table = "cart";
    public static $db_fields = ['name', 'description', 'total_price', 'package_selected_id','cart_image'];

    public $id;
    public $name;
    public $description;
    public $total_price;
    public $package_selected_id;
    public $cart_image;
} //end of class cart


$cart = new Cart();

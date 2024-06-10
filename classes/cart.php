<?php

class Cart extends Db_object
{
    public static $table = "cart";
    public static $db_fields = ['name', 'description', 'total_price', 'package_selected_id'];

    public $id;
    public $name;
    public $description;
    public $total_price;
    public $package_selected_id;
} //end of class cart


$cart = new Cart();

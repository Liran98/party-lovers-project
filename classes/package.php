<?php

class Package extends Db_object
{
    public static $table = "packages";
    public static $db_fields = ['package_name', 'package_image', 'package_items', 'package_theme','package_price'];

    public $id;
    public $package_name;
    public $package_image;
    public $package_items;
    public $package_theme;
    public $package_price;

    
}//end of class Package

$package = new Package();
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

    public $file_directory = "images";
    public $tmp_path = "";

    public function set_file($file)
    {
        $this->package_image = $file['name'];

        $this->tmp_path = $file['tmp_name'];

        $path_for_img = IMG_PATH . DS . $this->package_image;

        if(file_exists($path_for_img)){
            echo "<p class='bg-danger text-center'>image already exists</p>";
        return false;
        }
       if (move_uploaded_file($this->tmp_path, $path_for_img)) {
            unset($this->tmp_path);
            return true;
        };
    }

    public function img_path()
    {
        return $this->file_directory . DS . $this->package_image;
    }


}//end of class Package

$package = new Package();
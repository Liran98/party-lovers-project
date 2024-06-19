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



    public function delete_img()
    {
     
        // Construct the full image path
        $imgpath = $imgpath = SITE_ROOT . DS .$this->img_path();
        
        // Check if the file exists before attempting to delete
        if (file_exists($imgpath)) {
            // Attempt to delete the file and return the result
            if (unlink($imgpath)) {
                return true;
            } else {
                // Log the error if unlink fails
                error_log("Error: Failed to delete the image at path: $imgpath");
                return false;
            }
        } else {
            // Log the error if the file does not exist
            error_log("Error: Image not found at path: $imgpath");
            return false;
        }
    }
    
}//end of class Package

$package = new Package();
<?php

class Event extends Db_object
{
    public static $table = "events";
    public static $db_fields = ['theme_type', 'title', 'description', 'event_image', 'package_id'];

    public $id;
    public $package_id;
    public $theme_type;
    public $title;
    public $description;

    public $event_image;
    public $file_directory = "images";
    public $tmp_path = "";

    public function find_by_search($search)
    {
        return static::find_query("SELECT theme FROM " . static::$table . " WHERE theme LIKE '%$search%' LIMIT 1");
    }


    public function set_file($file)
    {
            $this->event_image = $file['name'];
            $this->tmp_path = $file['tmp_name'];
            move_uploaded_file($this->tmp_path, SITE_ROOT.$this->file_directory.DS.$this->event_image);
            unset($this->tmp_path);
    }

    public function img_path(){
        return SITE_ROOT.$this->file_directory.DS.$this->event_image;
    }

    // public function delete_img(){
    //     $img_path = 
    //     return unlink($img_path);
    // }
} //end of class Event


$event = new Event();

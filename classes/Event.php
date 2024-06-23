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

        $path_for_img = IMG_PATH . DS . $this->event_image;

        if (file_exists($path_for_img)) {
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
        return $this->file_directory . DS . $this->event_image;
    }



    public function delete_img($id)
    {

        if ($this->delete($id)) {
            $imgpath = SITE_ROOT . DS . $this->img_path();

            return unlink($imgpath);
        }
    }
} //end of class Event


$event = new Event();

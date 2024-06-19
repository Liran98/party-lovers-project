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
   

    
    public function find_by_search($search)
    {
        return static::find_query("SELECT theme FROM " . static::$table . " WHERE theme LIKE '%$search%' LIMIT 1");
    }

    public function set_file($file)
    {
        $this->event_image = $file['name'];

        $this->tmp_path = $file['tmp_name'];

        $path_for_img = IMG_PATH . DS . $this->event_image;

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
        return $this->file_directory . DS . $this->event_image;
    }



    public function delete_img()
    {
     
        // Construct the full image path
        $imgpath = SITE_ROOT . DS .$this->img_path();
        
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
} //end of class Event


$event = new Event();

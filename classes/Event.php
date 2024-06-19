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

  
} //end of class Event


$event = new Event();

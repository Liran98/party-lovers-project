<?php

class Event
{
    protected $table = "events";

    public $id;
    public $theme_type;
    public $title;
    public $description;
    public $date;
    public $package_selection;
    public $event_image;


    public function find_by_search($search)
    {
        return self::find_query("SELECT theme FROM " . $this->table . " WHERE theme LIKE '%$search%' LIMIT 1");
    }


    public function find_by_id($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = $id LIMIT 1";
        return  self::find_query($sql);
    }

    public function find_all()
    {
        $sql = "SELECT * FROM $this->table ";
        return self::find_query($sql);
    }


    public static function find_query($sql)
    {
        global $database;

        $res = $database->query($sql);

        $arr = array();

        while ($row = mysqli_fetch_assoc($res)) {

            $arr[] = self::instant($row);
        }

        return $arr;
    }




    public static function instant($row)
    {
        $obj = new self;
        foreach ($row as $key => $value) {
            if ($obj->get_attributes($key)) {
                $obj->$key = $value;
            } else {
                echo "attribute not found" . "<br>";
            }
        }
        return $obj;
    }

    public function get_attributes($attr)
    {
        $obj = get_object_vars($this);
        return array_key_exists($attr, $obj);
    }


public function redirect($file_name){
    return header('Location : '. $file_name . '.php');
}



} //end of class Event


$event = new Event();

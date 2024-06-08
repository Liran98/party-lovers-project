<?php

class Event
{


    public $id;
    public $theme;
    public $date;
    public $extras;

    protected $table = "events";
    protected $db_fields = ['theme', 'date', 'extras'];



    public function find_by_id($id)
    {
        global $database;
        $res =  $database->query("SELECT * FROM " . $this->table . " WHERE id = $id");

        while ($row = mysqli_fetch_array($res)) {
            $this->id = $row['id'];
            $this->theme = $row['theme'];
            $this->date = $row['date'];
            $this->extras = $row['extras'];
        }
    }

    public function instant()
    {
        $obj = new self;
        

    }

    public function get_attributes($attr)
    {
        $obj = get_object_vars($this);
       return array_key_exists($obj,$attr);
        
    }
} //end of class Event


$event = new Event();

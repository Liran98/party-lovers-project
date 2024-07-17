<?php

class Db_object
{

    public $file_directory = "images";
    public $tmp_path = "";

    public function find_all()
    {
        $sql = "SELECT * FROM " . static::$table;
        return static::find_query($sql);
    }


    public function find_by_id($id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = $id LIMIT 1";
      $res =  static::find_query($sql);

       return (!empty($res) ? array_shift($res) : false);
    }



    public static function find_query($sql)
    {
        global $database;

        $res = $database->query($sql);

        $arr = [];

        while ($row = mysqli_fetch_assoc($res)) {

            $arr[] = static::instant($row);
        }

        return  $arr;
    }




    public static function instant($row)
    {
        //!new self wouldnt work on the parent class when you other classes are instantiated
        $called = get_called_class();
        $obj = new $called;

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


    public function count_all()
    {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$table;

        $res =  $database->query($sql);

        $row =  mysqli_fetch_array($res);

        return array_shift($row);
    }



    public function create()
    {
        global $database;
        $props = $this->properties();

        $sql = "INSERT INTO " . static::$table . "(" . implode(",", array_keys($props)) . ")";
        $sql .= " VALUES('" . implode("','", array_values($props)) . "')";

        return $database->query($sql);
    }
    public function delete($id)
    {
        global $database;
        $sql = "DELETE FROM " . static::$table . " WHERE id = " . $id;
        return $database->query($sql);
    }
    public function update($id)
    {
        global $database;
        $obj = $this->properties();
        $obj_pairs = [];


        foreach ($obj as $key => $val) {
            $obj_pairs[] = "{$key} ='{$val}'";
        }

        $sql = "UPDATE " . static::$table . " SET ";
        $sql .= implode(",", $obj_pairs);
        $sql .= " WHERE id = '$id'";


        return $database->query($sql);
    }


    public function properties()
    {
        $props = array();

        foreach (static::$db_fields as $db_field) {
            if (property_exists($this, $db_field)) {
                $props[$db_field] = $this->$db_field;
            }
        }
        return $props;
    }


 

} //end of class db_object

$db = new Db_object();

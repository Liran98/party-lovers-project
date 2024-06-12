<?php

class Db_object
{

    public function find_all()
    {
        $sql = "SELECT * FROM " . static::$table;
        return static::find_query($sql);
    }


    public function find_by_id($id)
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = $id LIMIT 1";
        return  static::find_query($sql);
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

        $res =  $this->find_all();

        return count($res);
    }

    public function delete($id)
    {
        return static::find_query("DELETE FROM " . static::$table . " WHERE id = " . $id);
    }

    public function create()
    {
        global $database;
        $props = $this->properties();

        $sql = "INSERT INTO " . static::$table . "(" . implode(",", array_keys($props)) . ")";
        $sql .= " VALUES('" . implode("','", array_values($props)) . "')";

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

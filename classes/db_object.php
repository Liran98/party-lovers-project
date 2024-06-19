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
        global $database;
        $sql = "DELETE FROM " . static::$table ." WHERE id =".$id;
        return $database->query($sql);
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

    public function set_file($file,$col)
    {
        $col = $file['name'];

        $this->tmp_path = $file['tmp_name'];

        $path_for_img = IMG_PATH . DS . $col;

        if(file_exists($path_for_img)){
            echo "<p class='bg-danger text-center'>image already exists</p>";
        return false;
        }
       if (move_uploaded_file($this->tmp_path, $path_for_img)) {
            unset($this->tmp_path);
            return true;
        };
    }

    public function img_path($img_data)
    {
        return $this->file_directory . DS . $img_data;
    }



    public function delete_img($img_data)
    {
     
        // Construct the full image path
        $imgpath = IMG_PATH . DS . $img_data;
        
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
} //end of class db_object

$db = new Db_object();

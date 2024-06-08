<?php

class Event extends Db{
public $table = "events";
public $id;
public $theme;
public $date;
public $extras;

public function find_all(){
    return $this->connection->query("SELECT * FROM " . $this->table);
}



}












?>
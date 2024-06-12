<?php



function redirect($path){
    return header("Location: " . $path .".php");
    exit;
}







?>
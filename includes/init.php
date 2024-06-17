
<?php

defined("DS") ? null : define('DS',DIRECTORY_SEPARATOR);

defined("SITE_ROOT") ? null : define('SITE_ROOT',DS."MAMP\htdocs\party_lovers_project");


//for images
defined("IMG_PATH") ? null : define('IMG_PATH',SITE_ROOT.DS."images");

//for classes
defined("PATH") ? null : define('PATH',SITE_ROOT.DS."classes");



 require_once("functions.php"); 
 require_once(PATH.DS."db_object.php"); 
 require_once(PATH.DS."database.php"); 

 require_once(PATH.DS."Event.php"); 
 require_once(PATH.DS."package.php"); 
 require_once(PATH.DS."cart.php"); 
 require_once(PATH.DS."users.php"); 



?>



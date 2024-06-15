
<?php

defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);

defined("SITE_ROOT") ? null : define("SITE_ROOT","C:\MAMP\htdocs\party lovers project");


//for classes
defined("PATH") ? null : define('PATH',SITE_ROOT.DS."classes");


?>


<?php require_once("includes/functions.php"); ?>
<?php require_once(PATH.DS."database.php"); ?>
<?php require_once(PATH.DS."db_object.php"); ?>
<?php require_once(PATH.DS."Event.php"); ?>
<?php require_once(PATH.DS."package.php"); ?>
<?php require_once(PATH.DS."cart.php"); ?>
<?php require_once(PATH.DS."users.php"); ?>




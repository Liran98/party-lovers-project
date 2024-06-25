<?php include("includes/header.php"); ?>
<?php


unset($_SESSION['email']);
unset($_SESSION['username']);
unset($_SESSION['user_role']);
unset($_SESSION['id']);

redirect("index");
?>
<?php include("includes/footer.php"); ?>
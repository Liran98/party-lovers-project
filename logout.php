<?php include("includes/header.php"); ?>
<?php
$session->logout();
redirect("login");
?>
<?php include("includes/footer.php"); ?>
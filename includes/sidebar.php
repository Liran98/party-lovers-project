<!-- class=👇offcanvas offcanvas-start👇 -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Party Lovers <img style="width: 70px;" src="images/party_logo.png"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">


        <form method="post" action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                    <input type="submit" value="Search" name="search" class="btn btn-light btn-outline-dark">
                </div>
            </div>
        </form>
    </div>

   

<?php
$cart = new Cart();

$carts = $cart->find_all();

foreach ($carts as $items) {
?>
    <ul class="list-group">
        <li class="list-group-item">
        <img style="width: 80px;" src="<?php echo $items->cart_image; ?>" alt="">
            <?php echo $items->description; ?>
            <?php echo $items->name; ?>
            <?php echo $items->total_price . "₱"; ?>
           
            <a class="btn btn-light btn-outline-dark"  href="index.php?del=<?php echo $items->id; ?>">x</a>
        </li>
        
    </ul>
<?php

}
if (isset($_GET['del'])) {
    $cart->delete($_GET['del']);
}
?>

</div>
<!-- end of canvas -->






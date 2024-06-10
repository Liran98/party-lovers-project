<?php include("includes/header.php"); ?>




<?php
if (isset($_GET['pack'])) {

    $packages = $package->find_by_id($_GET['pack']);

    foreach ($packages as $package) {
?>

        <div class="jumbotron m-2 p-3 text-dark  bio">
            <img style="width:500px" src="<?php echo $package->package_image; ?>">
            <h1 class="display-4  p-2">
                <p class="lead  p-3">
                    <span>
                        <?php echo $package->package_name; ?>
                    </span>

                </p>
                <?php echo $package->package_theme; ?>
            </h1>

            <p class="lead  p-3">
                <?php echo $package->package_items; ?>
            </p>
            <hr>

            <p class="lead ">
            <form action="" method="post">
                <a href="#">
                    <input name="add-to-cart" class="btn btn-outline-dark" type="submit" value="Add to Cart" />
                </a>
            </form>

            <a href="edit_package.php?edit=<?php echo $package->id; ?>">
                <input class="btn btn-outline-dark" type="submit" value="Edit" />
            </a>
            </p>
        </div>
<?php
    }
}
?>

<?php

if (isset($_POST['add-to-cart'])) {
    $name = $package->package_name;
    $desc = $package->package_theme;
    $price = $package->package_price;
    $pid = $_GET['pack'];
    $cart_img = $package->package_image;
    $sql = "INSERT INTO cart(name,description,total_price,package_selected_id,cart_image) VALUES('$name','$desc','$price','$pid','$cart_img')";

    if ($database->query($sql)) {
        echo "added to cart";
    };
}

?>





<?php include("includes/footer.php"); ?>
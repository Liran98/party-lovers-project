<?php include("includes/header.php"); ?>

<section class="text-light">

    <div class="container px-4 px-lg-5">
        
        <div class="row gx-4 gx-lg-5">
        
            <?php



            if (isset($_GET['pack'])) {


                $packages = $package->find_by_id($_GET['pack']);

                foreach ($packages as $package) {
            ?>
                    <div class="col-lg-6 col-md-6">
                        <h1 class="mt-5">
                            <img class="card img-fluid " style="width: 600px;" src="<?php echo $package->package_image; ?>">
                        </h1>
                        </div>
                        <div class="col-lg-6 cold-md-4">
                        <p class="lead  p-3">
                            <?php echo $package->package_theme; ?>
                            <span>
                                <?php echo $package->package_name; ?>
                            </span>
                        </p>
                        <p><?php echo $package->package_items; ?></p>

                        <form action="" method="post">

                            <input name="add-to-cart" class="btn btn-outline-light" type="submit" value="Add to Cart" />

                            <a href="edit_package.php?edit=<?php echo $package->id; ?>">
                                <input class="btn btn-outline-light" type="submit" value="Edit" />
                            </a>
                        </form>
                    </div>

            <?php
                }
            }
            ?>

        </div>
    </div>
</section>
<?php

if (isset($_POST['add-to-cart'])) {


    $cart = new Cart();

    $cart->name = $package->package_name;
    $cart->description = $package->package_theme;
    $cart->total_price = $package->package_price;
    $cart->package_selected_id = $package->id;
    $cart->cart_image = $package->package_image;

   $cart->create();

   redirect("events");
    
};



?>



<br>

<?php include("includes/footer.php"); ?>
<?php include("includes/header.php"); ?>

<section class="text-light">

    <div class="container px-4 px-lg-5">

        <div class="row gx-4 gx-lg-5">

            <?php



            if (isset($_GET['pack'])) {


                $packages = $package->find_by_id($_GET['pack']);

                foreach ($packages as $items) {
            ?>
                    <div class="col-lg-6 col-md-6">
                        <h1 class="mt-5">
                            <img class="card img-fluid " style="width: 600px;" src="<?php echo $items->img_path(); ?>">
                        </h1>
                    </div>
                    <div class="col-lg-6 cold-md-4">
                        <p class="lead  p-3">
                            Theme: <?php echo $items->package_theme; ?>
                            <span>
                                Name: <?php echo $items->package_name; ?>
                            </span>
                        </p>
                        <p>Items: <?php echo $items->package_items; ?></p>

                        <form action="" method="post" enctype="multipart/form-data">

                            <input name="add-to-cart" class="btn btn-outline-light" type="submit" value="Add to Cart" />

                            <a class="btn btn-outline-light" href="admin/edit_package.php?edit=<?php echo $items->id; ?>">
                                Edit
                            </a>
                        </form>
                    </div>

            <?php


                    if (isset($_POST['add-to-cart'])) {

                        $cart = new Cart();

                        $cart->name =  $items->package_name;
                        $cart->description =  $items->package_theme;
                        $cart->total_price =  $items->package_price;
                        $cart->package_selected_id =  $items->id;
                        $cart->cart_image =  $items->package_image;

                        $cart->create();

                        redirect("events");
                    };
                }
            }
            ?>

        </div>
    </div>
</section>


<?php include("includes/footer.php"); ?>
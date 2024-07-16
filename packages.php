<?php include("includes/header.php"); ?>

<section class="text-light py-5 my-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">


            <?php



            if (isset($_GET['pack'])) {

                $items = $package->find_by_id($_GET['pack']);

            ?>
                <div class="col-lg-6 col-md-6 ">
                    <h1 class="mt-5">
                        <img class="card img-fluid " style="width: 600px; height:450px;" src="<?php echo $items->img_path(); ?>">
                    </h1>
                </div>
                <div class="col-lg-6 cold-md-4">
                    <p class="lead  p-3">
                        Theme: <?php echo $items->package_theme; ?>
                        <span>
                            Name: <?php echo $items->package_name; ?>
                        </span>
                    </p>
                    <p class="price" data-price="<?php echo $items->package_price; ?>">Price: ₱<?php echo $items->package_price; ?></p>

                    <p>Items: <?php echo $items->package_items; ?></p>
                    <?php if ($session->is_signed_in()) : ?>

                        <form action="" method="post" enctype="multipart/form-data">

                            <input name="add-to-cart" class="btn btn-outline-light add-package" type="submit" value="Add to Cart" />

                            <?php
                            if ($session->check_user_role() == 'Admin') {
                            ?>
                                <a class="btn btn-outline-light" href="admin/edit_package.php?edit=<?php echo $items->id; ?>">
                                    Edit
                                </a>
                            <?php
                            }
                            ?>
                        </form>
                    <?php endif; ?>

                </div>

                <?php


                if (isset($_POST['add-to-cart'])) {

                    $cart = new Cart();

                    $cart->name =  $items->package_name;
                    $cart->description =  $items->package_theme;
                    $cart->total_price =  $items->package_price;
                    $cart->package_selected_id =  $items->id;
                    $cart->cart_image =  $items->package_image;
                    $cart->user_id = $session->user_id;
                    $cart->create();

                    redirect("events");
                };
            } else {
                $all_packs = $package->find_all();

                if (!$all_packs) {
                    redirect("index");
                }

                foreach ($all_packs as $items) {
                ?>

                    <div class="col-4 mb-5">
                        <div class="card">
                            <!-- Product image-->
                            <a class="nav-link" href="packages.php?pack=<?php echo $items->id; ?>">
                                <img class="card-img-top img-fluid" style="height: 260px;" src="<?php echo $items->img_path(); ?>" alt="..." />

                                <p class="text-center"><?php echo $items->package_theme; ?></p>
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $items->package_name; ?></h5>
                                        <h6 class="fw-bolder">
                                            ₱<?php
                                                echo $items->package_price;
                                                ?>
                                        </h6>
                            </a>
                        </div>
                    </div>



        </div>
    </div>
<?php
                }
            }
?>

</div>
</div>
</section>


<?php include("includes/footer.php"); ?>
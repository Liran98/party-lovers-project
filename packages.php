<?php include("includes/header.php"); ?>

<section class="text-light m-5">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
          

                <?php



                if (isset($_GET['pack'])) {

                    $items = $package->find_by_id($_GET['pack']);
                  
                ?>
                        <div class="col-lg-6 col-md-6  bsb-overlay" style="--bsb-overlay-opacity: 0.7;">
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
                            <?php if ($session->is_signed_in()) : ?>

                                <form action="" method="post" enctype="multipart/form-data">

                                    <input data-price="<?php echo $items->package_price; ?>" name="add-to-cart" class="btn btn-outline-light add-package" type="submit" value="Add to Cart" />

                                    <a class="btn btn-outline-light" href="admin/edit_package.php?edit=<?php echo $items->id; ?>">
                                        Edit
                                    </a>
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

                            $cart->create();

                            redirect("events");
                        };
                } else {
                    $all_packs = $package->find_all();
                    foreach ($all_packs as $items) {
                        ?>
                        <div class="col mb-5">
                            <div class="card h-100 w-100">

                                <!-- Product image-->
                                <a href="packages.php?pack=<?php echo $items->id; ?>">
                                    <img class="card-img-top img-fluid" src="<?php echo $items->img_path(); ?>" alt="..." />
                                    <p class="text-center"><?php echo $items->package_theme; ?></p>
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder"><?php echo $items->package_name; ?></h5>
                                            <h6 class="fw-bolder">
                                                <?php
                                                echo strlen($items->package_items) > 50 ? substr($items->package_items, 72) : $items->package_items;
                                                ?>
                                            </h6>
                                        </div>
                                    </div>
                                </a>
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
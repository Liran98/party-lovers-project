<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title text-light" id="offcanvasWithBothOptionsLabel">Party Lovers <img style="width: 70px;" src="images/party_logo.png"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <?php
        $container_class = '';

        if ($cart->count_all() == 0) {
            $container_class = '';
        } else {
            $container_class = 'bg-light';
        }


        ?>
        <div class="container <?php echo $container_class; ?> p-3">
            <div class="row gx-2 gx-lg-2">
                <?php
                $cart = new Cart();

                $carts = $cart->find_all();


                foreach ($carts as $items) {
                    if ($items->user_id == $session->user_id) {


                ?>

                        <div class="col-lg-12 div-data-sidebar">
                            <ul class="list-group-item">
                                <img style="width: 80px;" src="<?php echo "images/" . $items->cart_image; ?>" alt="">
                                <?php echo $items->description; ?>
                                <?php echo "₱" . $items->total_price; ?>
                                <a class="btn_remove_cart" href="<?php echo $_SERVER['PHP_SELF']; ?>?del=<?php echo $items->id; ?>"> <i class="fas fa-trash p-2"></i></a>
                            </ul>
                        </div>
                        <hr>

                <?php
                    } else {
                        echo "";
                    }
                }


                ?>
            </div>
        </div>

    </div>

</div>

<!-- end of canvas -->
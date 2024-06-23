<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title text-light" id="offcanvasWithBothOptionsLabel">Party Lovers <img style="width: 70px;" src="images/party_logo.png"></h5>
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



        <div class="container text-bg-light p-3">
            <div class="row gx-2 gx-lg-2">
                <?php
                $cart = new Cart();

                $carts = $cart->find_all();

                foreach ($carts as $items) {

                ?>

                    <div class="col-lg-12 div-data-sidebar">
                        <ul class="list-group-item">
                            <img style="width: 80px;" src="<?php echo "images/".$items->cart_image; ?>" alt="">
                            <?php echo $items->description; ?>
                            <?php echo "₱" . $items->total_price; ?>
                            <a class="btn_remove_cart" href="<?php echo $_SERVER['PHP_SELF']; ?>?del=<?php echo $items->id; ?>"> <i class="fas fa-trash p-2"></i></a>
                        </ul>
                    </div>
                    <hr>

                <?php

                }


                ?>
            </div>
            <p>Total Price: <span class="total"></span> </p>
        </div>

    </div>

</div>


<!-- end of canvas -->
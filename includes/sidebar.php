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


    <section>
        <div class="container px-2 px-lg-5">
            <div class="row gx-2 gx-lg-2">
                <?php
                $cart = new Cart();

                $carts = $cart->find_all();

                foreach ($carts as $items) {
                ?>

                    <div class="col-lg-8">
                        <img style="width: 80px;" src="<?php echo $items->cart_image; ?>" alt="">
                        <?php echo $items->description; ?>
                        <?php echo $items->total_price . "₱"; ?>


                    </div>
                    <div class="col-lg-4">
                        <a href="sidebar.php?del=<?php echo $items->id; ?>">Remove</a>
                    </div>

                <?php

                }

                if (isset($_GET['del'])) {
                    $cart->delete($_GET['del']);
                    redirect('index');
                }
                ?>
            </div>
        </div>
    </section>
</div>
<!-- end of canvas -->
<div class="col-12 col-lg-12 bsb-overlay background-position-center background-size-cover" style="--bsb-overlay-opacity: 0.7; ">
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand text-light" href="./index.php"><img style="width:40px;" src="images/party_logo.png"></a>
            <a class="navbar-brand text-light home-nav-link" href="./index.php">Home</a>
            <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link text-light home-nav-link" href="./gallery.php">Gallery</a>
                    </li>

                    <?php
                    if ($event->count_all() == 0 || $package->count_all() == 0) {
                        echo "";
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link text-light home-nav-link" href="./packages.php">Packages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light home-nav-link" href="./events.php">Events</a>
                        </li>
                    <?php
                    }
                    ?>

                    <li class="nav-item">
                        <a class="nav-link text-light home-nav-link" aria-current="page" href="./about_us.php">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light home-nav-link" href='./contact.php'>Contact</a>
                    </li>

                    <?php if ($session->is_signed_in()) : ?>
                        <li class="nav-item">
                            <a class="nav-link text-light home-nav-link" href='logout.php'>Logout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light home-nav-link" href='admin'>Admin</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            $logged_user = $user->find_by_id($session->user_id);
                            echo "<a class='nav-link text-dark bg-info'>Logged in: $logged_user->username </a>";
                            ?>

                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link text-light home-nav-link" href='./login.php'>Login</a>
                        </li>
                    <?php endif; ?>

                </ul>




                <?php if ($session->is_signed_in()) : ?>

                    <form class="d-flex">
                        <?php
                        $all_users =  $user->find_all();

                        foreach ($all_users as $uid) {
                            if ($uid->id == $session->user_id) {

                                $active_class = '';

                                if ($cart->count_all() == 0) {
                                    $active_class = 'dark';
                                } else {
                                    $active_class = 'info';
                                }
                            }
                        }

                        ?>
                        <i class="fa badge bg-<?php echo $active_class; ?> btn  fa-lg cart-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                            &#xf07a;
                            <span class="badge   ms-1 rounded-pill">
                                <?php
                              echo $cart->find_user_carts($session->user_id);

                                ?></span>
                        </i>
                    </form>

                <?php endif; ?>
            </div>
        </div>
    </nav>
</div>
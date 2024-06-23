<nav class="navbar navbar-expand-lg  bg-dark ">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand text-light" href="./index.php"><img style="width: 30px;" src="images/party_logo.png"></a>
        <a class="navbar-brand text-light home-nav-link" href="./index.php">Home</a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link text-light home-nav-link" href="./events.php">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light home-nav-link" aria-current="page" href="./about_us.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light home-nav-link" href='./contact.php'>Contact</a>
                </li>
                <?php
                if ($user->LoggedIn) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link text-light home-nav-link" href='./logout.php'>Logout</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-light home-nav-link" href='admin'>Admin</a>
                </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link text-light home-nav-link" href='./login.php'>Login</a>
                    </li>

                <?php
                }
                ?>

              

            </ul>
            <form class="d-flex">
                <?php
                $active_class = '';
                if ($cart->count_all() == 0) {
                    $active_class = 'dark';
                } else {
                    $active_class = 'info';
                }
                ?>
                <i class="fa badge bg-<?php echo $active_class; ?> btn  fa-lg" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    &#xf07a;
                    <span class="badge   ms-1 rounded-pill">
                        <?php
                        $cart = new Cart();
                        echo $cart->count_all();

                        ?></span>
                </i>
            </form>
        </div>
    </div>
</nav>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <?php
    $curuser = $user->find_by_id($session->user_id);

    if(!empty( $curuser->user_image)){
        $user_img = "../" .  $curuser->img_path();
    }else{
        $user_img = "../images/empty_img.png";
    }
    ?>
    <a class="navbar-brand home-link ps-3" href="index.php">Party Lovers Admins</a>
    <a class="navbar-brand home-link ps-3 " href="../index.php">Home🏠</a>

         
      
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="post" action="">
        <div class="input-group">
            <input class="form-control" name="search" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" name="search-btn" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="rounded-circle" style="width: 30px;" src="<?php echo  $user_img; ?>" alt="">
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <div class="text-center">
                    <div class="container">
                        <div class="row">

                            <div class="col-3">
                                <img class="rounded-circle" style="width: 50px;" src="<?php echo $user_img; ?>" alt="">
                            </div>
                            <div class="col-9">
                                <p class='text-success p-3'> <?php echo $curuser->username; ?> </p>
                            </div>
                        </div>
                    </div>

                </div>
                <hr>
                <form action="" method="post">
                    <li>
                        <button name='logout-btn' class=" btn btn-danger">
                            <i class="fas fa-sign-out"></i> Logout from <?php echo $curuser->username; ?>
                        </button>

                    </li>
                </form>
            </ul>
        </li>
    </ul>
</nav>

<?php
if (isset($_POST['logout-btn'])) {
    $session->logout();
    redirect("../login");
}


if (isset($_POST['search-btn'])) {
    $search = $_POST['search'];

    switch ($search) {
        case 'all events':
            redirect("all_events");
            break;
        case 'event':
            redirect("add_event");
            break;
        case 'all packages':
            redirect("all_packages");
            break;
        case 'package':
            redirect("add_package");
            break;
        case 'all users':
            redirect("all_users");
            break;

        case 'home':
            redirect("index");
            break;
    }
}

?>
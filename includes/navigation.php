<nav class="navbar navbar-expand-lg bg-secondary ">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="./about_us.php">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./events.php">Events🎊</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="./packages.php">Packages</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href='./contact.php'>Contact</a>
                </li>
                <li class="nav-item">
                    <i class="fa badge fa-lg" 
                    data-bs-toggle="offcanvas" 
                    data-bs-target="#offcanvasWithBothOptions" 
                    aria-controls="offcanvasWithBothOptions" 
                    value=<?php 
                    $cart = new Cart(); 
                    echo $cart->count_all();
                    ?>
                    >&#xf07a;
                </i>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='admin'>ADMIN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

 
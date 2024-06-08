<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php">Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        // $curpage = basename($_SERVER['PHP_SELF']);

        // $active_class = "";
        // if (basename($_SERVER['PHP_SELF']) == $curpage) {
        //     $active_class = "active";
        // } else {
        //     $active_class = "";
        // }


        ?>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">About us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./events.php">Events🎊</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href='#'>Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
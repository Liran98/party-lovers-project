<?php include("includes/header.php"); ?>

<div class="col-2"></div>
<div class="main-content col-10">
    <div class="container-fluid mt-7">
        <!-- Table -->

        <!-- Dark table -->
        <div class="col">
            <div class="bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0">All Packages</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Theme</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $all_packages = $package->find_all();

                            foreach ($all_packages as $packages) {

                            ?>
                                <tr>
                                    <th scope="row">
                                        <div class="media align-items-center">

                                            <img class="avatar rounded-circle mr-3 bg-dark" src="<?php echo  "../" . $packages->img_path(); ?>">


                                        </div>
                                    </th>

                                    <td>
                                        <div class="media-body">
                                            <span class="mb-0 text-sm"><?php echo $packages->package_name; ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo $packages->package_theme; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <?php echo $packages->package_price; ?>
                                            <div>

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="all_packages.php?del=<?php echo $packages->id; ?>"> 🗑️ </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php




if (isset($_GET['del'])) {
    if ($package->delete_img()) {
        if ($package->delete($_GET['del'])) {

            redirect("all_packages");
        };
    };
}



?>


<?php include("includes/footer.php"); ?>
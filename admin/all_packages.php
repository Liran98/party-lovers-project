<?php include("includes/header.php"); ?>

<div class="col-2"></div>
<div class="main-content col-10">
    <div class="container-fluid mt-7">


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
                                <input type="checkbox" class="allpackages m-2">
                                <form action="" method="post">
                                    <input hidden type="submit" name="del-pack" value="Delete All" class=" btn btn-danger del-packages">
                                </form>
                                <th scope="col">Image</th>
                                <th scope="col">Package Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Theme</th>
                                <th scope="col">Price</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Edit</th>

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
                                            <form action="" method="post" >
                                                <input  class="check-package" type="checkbox" name="check_pack[]" value="<?php echo $packages->id; ?>">
                                            </form>
                                            <img class="avatar rounded-circle mr-3 bg-dark" src="
                                            <?php
                                            echo "../" . $packages->img_path();
                                            ?>
                                            ">


                                        </div>
                                    </th>
                                    <td>
                                        <div class="media-body">
                                            <span class="mb-0 text-sm"><?php echo $packages->id; ?></span>
                                        </div>
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
                                        <a href="all_packages.php?del=<?php echo $packages->id; ?>"> <i class="fas fa-trash p-2"></i> </a>
                                    </td>
                                    <td>
                                        <a href="edit_package.php?edit=<?php echo $packages->id; ?>"><i class="fas fa-edit p-2"></i> </a>
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
    if ($package->delete($_GET['del'])) {
        redirect("all_packages");
    };
}



if (isset($_POST['del-pack'])) {
    if (isset($_POST['check_pack'])) {

        $pid = $_POST['check_pack'];
        foreach($pid as $id){
            $package->delete($id);
        }
}else{
    echo "couldnt delete package";
}
}
?>

<script>
    const btn_checkbox = document.querySelector('.allpackages');
    const btn_per_package = document.querySelectorAll('.check-package');
    const delete_package = document.querySelector('.del-packages');


    let is_checked = false;
    btn_checkbox.addEventListener('click', function(e) {


        if (!is_checked) {
            delete_package.hidden = false;
            btn_per_package.forEach(function(btn) {
                btn.checked = true;
            });
        } else {
            delete_package.hidden = true;
            btn_per_package.forEach(function(btn) {
                btn.checked = false;
            });
        }

        is_checked = !is_checked;


    });
</script>
<?php include("includes/footer.php"); ?>
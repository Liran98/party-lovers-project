<?php include("includes/header.php"); ?>
<section class="py-3 py-md-5 py-xl-8 m-4 p-4">
    <div class="container-fluid d-flex justify-content-center">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-10">
                <div class="rounded shadow-sm overflow-hidden text-light m-3">
                    <h3 class="text-center m-3 text-light">Edit Package</h3>
                    <div class="row align-items-lg-center h-100 ">
                        <div class="col-12 ">
                            <?php
                            if (!isset($_GET['edit'])) {
                                redirect("all_packages");
                            }




                            if (isset($_POST['edit_package'])) {


                                $package->package_name = $_POST['name'];
                                $package->package_items = trim($_POST['package_items']);
                                $package->package_theme = $_POST['package_theme'];
                                $package->package_price = $_POST['package_price'];


                                $package->set_file($_FILES['package_image']);

                                $package->update($_GET['edit']);

                                echo "<p class='bg-success text-center'>package updated successfully</p>";

                                redirect("all_packages");
                            }
                            ?>

                            <?php
                            if (isset($_GET['edit'])) {
                                $pid = $package->find_by_id($_GET['edit']);

                                foreach ($pid as $val) {
                            ?>

                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row gy-4 gy-xl-5 p-4 p-xl-5">

                                            <div class="col-6">
                                                <label for="name" class="form-label">Package Name </label>
                                                <input type="text" class="form-control" id="name" name="name" value="<?php echo $val->package_name; ?>" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="package image" class="form-label">Package Image</label>
                                                <input class="form-control" type="file" name="package_image">
                                                <?php echo $val->package_image; ?>
                                            </div>

                                            <div class="col-6">
                                                <label for="theme" class="form-label">Package theme</label>
                                                <input class="form-control" type="text" name="package_theme" value="<?php echo $val->package_theme; ?>">
                                            </div>

                                            <div class="col-6">
                                                <label for="price" class="form-label">Package price</label>
                                                <input class="form-control" type="text" name="package_price" value="<?php echo $val->package_price; ?>">
                                            </div>
                                            <div class="col-12">
                                                <label for="package_items" class="form-label">Package items</label>
                                                <textarea class="form-control" name="package_items" rows="10" cols="10">
                                       <?php echo $val->package_items; ?>
                                        </textarea>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button name="edit_package" class="btn btn-primary btn-lg" type="submit">Edit package</button>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </form>
                            <?php
                                }
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<br>



<?php include("includes/footer.php"); ?>
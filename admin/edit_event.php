<?php include("includes/header.php"); ?>
<section class="py-3 py-md-5 py-xl-8 m-4 p-4">
    <div class="container-fluid d-flex justify-content-center">
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-10">
                <div class="rounded shadow-sm overflow-hidden text-light m-3">
                    <h3 class="text-center m-3 text-light">Edit Event</h3>
                    <div class="row align-items-lg-center h-100 ">
                        <div class="col-12 ">
                            <?php
                            if (isset($_POST['Update_event'])) {

                                $event->title = $_POST['title'];
                                $event->description = trim($_POST['description']);
                                $event->theme_type = $_POST['Themetype'];
                                $event->package_id = $_POST['package_id'];

                                $event->set_file($_FILES['event_image']);

                                $event->update($_GET['edit']);

                                echo "<p class='bg-success text-center'>event Updated successfully</p>";

                                redirect("all_events");
                            }



                            ?>

                            <?php

                            if (isset($_GET['edit'])) {
                                $val = $event->find_by_id($_GET['edit']);

                            ?>

                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="row gy-4 gy-xl-5 p-4 p-xl-5">

                                            <div class="col-6">
                                                <label for="title" class="form-label">Title </label>
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $val->title; ?>" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="image" class="form-label">Event Image</label>
                                                <input class="form-control" type="file" name="event_image">
                                                <?php echo $val->event_image; ?>
                                            </div>
                                            <div class="col-6">
                                                <label for="Themetype" class="form-label">Theme type </label>
                                                <select class="form-select" name="Themetype" id="">
                                                    <option selected><?php echo $val->theme_type; ?></option>
                                                    <p>
                                                        <hr>
                                                    </p>
                                                    <option value="Adventure">Adventure</option>
                                                    <option value="Super heros">Super heros</option>
                                                    <option value="Anime">Anime</option>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label for="PackageId" class="form-label">Package Selection</label>
                                                <select class="form-select" name="package_id" id="">
                                                    <!-- add for each here php ids -->

                                                    <?php
                                                    $theme= $package->find_by_id($val->package_id);

                                                    ?>
                                                        <option value="<?php echo  $theme->id; ?>" selected>Selected : <?php echo  $theme->package_theme; ?></option>
                                                        <p>
                                                            <hr>
                                                        </p>
                                                    <?php
                                                    ?>
                                                    <?php

                                                    $packages = $package->find_all();

                                                    foreach ($packages as $item) {
                                                    ?>
                                                        <option value='<?php echo $item->id; ?>'>
                                                            <?php echo $item->package_theme; ?>
                                                        </option>";
                                                    <?php
                                                    }

                                                    ?>

                                                </select>

                                            </div>

                                            <div class="col-12">
                                                <label for="Description" class="form-label">Description</label>
                                                <textarea class="form-control" name="description" rows="10" cols="10">
<?php echo $val->description; ?>
                                        </textarea>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button name="Update_event" class="btn btn-primary btn-lg" type="submit">Update Event</button>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </form>
                            <?php
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
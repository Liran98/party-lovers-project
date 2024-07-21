<?php include("includes/header.php"); ?>
<section class="py-3 py-md-5 py-xl-8 m-4 p-4">

    <div class="container-fluid d-flex justify-content-center">
        <div class="row">

            <div class="col-2">
            </div>

            <div class="col-10 bg-light">
                <div class="rounded shadow-sm overflow-hidden  m-3">
                    <h3 class="text-center m-3 ">Add Event</h3>
                    <?php
                    if ($package->count_all() == 0) {
                        echo " <h6 class='text-center m-3 text-danger package_empty'>You Have to add a package before adding an event*</h6>";
                    }
                    ?>

                    <div class="row align-items-lg-center h-100 ">
                        <div class="col-12 ">
                            <?php
                            if (isset($_POST['add_event'])) {

                                $event->title = $_POST['title'];
                                $event->description = $_POST['description'];
                                $event->theme_type = $_POST['Themetype'];
                                $event->package_id = $_POST['package_id'];

                                $event->set_file($_FILES['event_image']);

                                if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['Themetype']) && !empty($_POST['package_id'])) {

                                    $event->create();

                                    echo "<p class='bg-success text-center'>event added successfully</p>";

                                    redirect("all_events");
                                }
                            }



                            ?>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row gy-4 gy-xl-5 p-4 p-xl-5">

                                    <div class="col-5">
                                        <label for="title" class="form-label p-3">Title<span class="text-danger event_title_validation">*</span> </label>
                                        <input type="text" class="form-control title" id="title" name="title" value="" required>
                                    </div>
                                    <div class="col-5">
                                        <label for="image" class="form-label p-3">Event Image (Optional)</label>
                                        <input id="file-input" class="form-control" type="file" name="event_image">
                                    </div>
                                    <div class="col-2">
                                        <img id="card_img" style="width: 150px;" src="" alt="">
                                    </div>
                                    <div class="col-5">
                                        <label for="Themetype" class="form-label">Theme type<span class="text-danger event_type_validation">*</span> </label>
                                        <select class="form-select theme_type" name="Themetype" id="">
                                            <option value="">Theme Type Selection</option>

                                            <option value="Adventure">Adventure</option>
                                            <option value="Super heros">Super heros</option>
                                            <option value="Anime">Anime</option>
                                            <option value="Halloween">Halloween</option>
                                            <option value="Christmas">Christmas</option>
                                            <option value="Video games">Video games</option>


                                        </select>
                                    </div>

                                    <div class="col-5">
                                        <label for="PackageId" class="form-label">Package Id<span class="text-danger event_id_validation">*</span></label>
                                        <select class="form-select package_id" name="package_id" id="">
                                            <!-- add for each here php ids -->
                                            <option value="">Package Selection</option>
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

                                    <div class="col-10">
                                        <label for="Description" class="form-label">Description<span class="text-danger event_description_validation">*</span></label>
                                        <textarea class="form-control" id="description" name="description" rows="10" cols="10"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <?php if ($package->count_all() == 0) {
                                                echo "<button disabled name='add_event' class='btn btn-primary btn-lg' type='submit'>Add Event</button>";
                                            } else {
                                                echo "<button  name='add_event' class='btn btn-primary btn-lg' type='submit'>Add Event</button>";
                                            } ?>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>



</section>
<br>

<script type="module">
    import {load_img} from './js/load-img.js';
    import {check_validation} from './js/scripts.js';

    load_img("file-input", "card_img");


    const theme_type = document.querySelector('.theme_type');
    const package_id = document.querySelector('.package_id');
    const title = document.querySelector('.title');
    const description = document.getElementById('description');

    const event_title_validation = document.querySelector('.event_title_validation');
    const event_type_validation = document.querySelector('.event_type_validation');
    const event_id_validation = document.querySelector('.event_id_validation');
    const event_description_validation = document.querySelector('.event_description_validation');


    check_validation(theme_type,event_type_validation);
    check_validation(title,event_title_validation);
    check_validation(package_id,event_id_validation);
    check_validation(description,event_description_validation);


</script>

<?php include("includes/footer.php"); ?>
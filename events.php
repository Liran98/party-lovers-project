<?php include("includes/header.php"); ?>

<section class="py-5 my-5">
    <div class="container px-4 px-lg-5 ">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center m-3 ">
            <?php
            $events = $event->find_all();

            foreach ($events as $event) {
            ?>

                <div class="col mb-5">
                    <div class="card">
                        <!-- Product image-->
                        <img class="card-img-top img-fluid" src="<?php echo $event->img_path(); ?>" alt="..." />
                        <p class="text-center"><?php echo $event->title; ?></p>
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $event->theme_type; ?></h5>
                                <h6 class="fw-bolder">
                                    <?php
                                    echo strlen($event->description) > 50 ? substr($event->description, 72) : $event->description;


                                    ?>
                                </h6>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                           
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="packages.php?pack=<?php echo $event->package_id; ?>">View Package</a></div>
                        </div>
                    </div>
                </div>




            <?php
            }

           
            ?>
        </div>
    </div>

    <?php
     if(!$events){
        echo "<h1 class='text-light text-center'>No events found . 
        <a class='btn btn-info btn-outline-light' href='admin/add_event.php'>Add one maybe?</a>
         </h1>";
    }
    
    ?>
</section>


<?php include("includes/footer.php"); ?>
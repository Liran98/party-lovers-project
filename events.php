<?php include("includes/header.php"); ?>

<div class="row row-cols-md-3 g-4 ">
    <?php

    $events = $event->find_all();

    foreach ($events as $event) {
    ?>

        <div class="col-sm-6 col-xs-6">
            <div class="card">
                <img src="<?php echo $event->event_image; ?>" class="card-img-top" alt="" />
                <div class="card-body">
                    <span>
                        <?php echo $event->theme_type; ?>
                    </span>
                    <h5 class="card-title"> <?php echo strtoupper($event->title); ?></h5>
                    <p class="card-text">
                        <?php echo $event->description; ?>
                    </p>
                    <a href="pricing.php">
                        <input class="btn btn-outline-dark" type="submit" value="Check The Package" />
                    </a>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>



<?php include("includes/footer.php"); ?>
<?php include("includes/header.php"); ?>



<div class="container my-3">
    <h5 class="text-center  text-white p-3">
        Our gallery showcases the creativity, joy, and meticulous planning that go into every event we host. <br>
        Whether it's a wedding, corporate gathering, or themed party, <br>
        you'll find inspiration and memories in every image. <br>
        Explore our gallery to see
        the magic of our events come to life and imagine how we can make your next celebration truly extraordinary.
    </h5>
    <div class="row row-cols-1 row-cols-md-2
                    row-cols-lg-3 g-3">


        <?php
        $total_pics = 12;

        for ($i = 0; $i < $total_pics; $i++) {
        ?>
            <div class="col gallery_img">
                <div>
                    <img src="./gallery_images/gallery<?php echo $i; ?>.jpg" alt="Image 6" class="w-100">
               
                </div>
            </div>
        <?php
        }
        ?>

    </div>
</div>

<?php include("includes/footer.php"); ?>
<div class="d-flex flex-column my-5 ">
    <!-- FOOTER -->
    <div class="col-12 col-lg-12 bsb-overlay background-position-center background-size-cover" style="--bsb-overlay-opacity: 0.7; ">
    <footer class=" py-4 my-4 text-light justify-content-center   h-50">
        <div class="container">
            <div class="row">
          
                <div class="col-lg-6 col-md-6">
                    <h5 class="h1"><img style="width: 60px;" src="images/party_logo.png"> Party Lovers Officals</h5>
                    <p class="small ">
                        About Party Lovers Official
                        Party Lovers Official is your ultimate destination for party inspiration, tips, and products.
                        Whether you're planning a small gathering or a large event,
                        we've got you covered with the latest trends and must-have items to make your party unforgettable.
                    </p>

                </div>
                <?php
                $page = substr(basename($_SERVER['PHP_SELF']), 0, -4);
                $display_class = '';
                if ($page == "contact") {
                    $display_class = 'none';
                } else {
                    $display_class = '';
                }
                ?>

                <div style="display: <?php echo $display_class; ?>;" class="col-lg-6 col-md-6 ">
                    <h5 class="mb-3">Contact us</h5>
                    <p class="small">Get in Touch
                        Have questions or need assistance? We're here to help!</p>
                    <form action="#">
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>

                <hr>
                <div class="col-lg-3 col-md-6">
                    <h5 class=" mb-3">Quick links</h5>
                    <ul class="list-unstyled text-muted">
                        <li><a class="nav_link" href="index.php">Home<i class='bx bx-home nav_icon'></i></a></li>
                        <li><a class="nav_link" href="about_us.php">About<i class='bx bx-folder nav_icon'></i></a></li>
                        <li><a class="nav_link" href="register.php">Register<i class='bx bx-user nav_icon'></i></a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-3">
                    <h5 class="mb-3">Follow Us on Social Media</h5>
                    <p class="small">Stay updated with our latest news, promotions, and party ideas.</p>
                    <ul class="list-unstyled text-muted">
                        <li><a class="nav_link" href="https://www.facebook.com/partyloversinc/">FaceBook<i class='bx bxl-facebook nav_icon'></i></a></li>
                        <li><a class="nav_link" href="#">Instagram<i class='bx bxl-instagram nav_icon'></i></a></li>
                    </ul>
                </div>
                <p class="text-center "><?php echo date("Y") ?>&copy;Party Lovers Offical Copyrights. All rights reserved. </p>
            </div>
        </div>
        
    </footer>
</div>
</div>








<script src="js/scripts.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"> -->
</script>

</body>

</html>


<!-- Follow Us on Social Media
Stay updated with our latest news, promotions, and party ideas. -->
<?php include("includes/header.php"); ?>
<section class="py-3 py-md-5 py-xl-8">

    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-12">
                <div class="rounded shadow-sm overflow-hidden text-light">
                    <h1 class="text-center">Register</h1>
                    <div class="row align-items-lg-center h-100 ">
                        <div class="col-12 ">

                            <form action="" method="post">
                                <div class="row gy-4 gy-xl-5 p-4 p-xl-5">

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" value="@gmail.com" required>
                                    </div>

                                    <div class="col-12">
                                        <label for="fullname" class="form-label">User Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="fullname" name="user" value="" required>
                                    </div>


                                    <div class="col-12">
                                        <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password" value="" required>
                                    </div>



                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-lg" name="register" type="submit">Sign Up</button>
                                        </div>
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
    </div>
</section>
<br>
<?php
if (isset($_POST['register'])) {
    $user->find_all();
    
    $user->username = $_POST['user'];
    $user->password = $_POST['password'];
    $user->email = $_POST['email'];

    if ($user->create()) {
        $user->login();
    };
}




?>
<?php include("includes/footer.php"); ?>
<?php include("includes/header.php"); ?>
<?php if($session->is_signed_in()) redirect("index"); ?>
<?php

if (isset($_POST['register'])) {

    $user->username = $_POST['user'];
    $user->email = $_POST['email'];
    $user->user_role = "subscriber";


    $password = $_POST['password'];

    $options = array("cost" => 12);
    $password =  password_hash($password, PASSWORD_BCRYPT, $options);
    $user->password = $password;

    if ($user->create()) {
        redirect("login");
    };
}

?>
<section class="py-3 py-md-5 py-xl-8">

    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-12 col-lg-12 bsb-overlay background-position-center background-size-cover" style="--bsb-overlay-opacity: 0.7;">
                <div class="col-12">
                    <div class="rounded shadow-sm overflow-hidden text-light">
                        <h1 class="text-center">Register</h1>
                        <div class="row align-items-lg-center h-100 ">
                            <div class="col-12 ">

                                <form action="" method="post">
                                    <div class="row gy-4 gy-xl-5 p-4 p-xl-5">
                                        <div class="col-8">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control email" id="email" name="email" value="" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="email" class="form-label">Selection <span class="text-danger">*</span></label>
                                            <select class="form-select" name="" id="email_selection">
                                                <option value="">Select Email Type</option>
                                                <hr>
                                                <option value="@yahoo.com">Yahoo</option>
                                                <option value="@mail.com">Mail</option>
                                                <option value="@hotmail.com">Hotmail</option>
                                                <option value="@gmail.com">Gmail</option>
                                            </select>
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
    </div>
</section>
<br>

<?php include("includes/footer.php"); ?>
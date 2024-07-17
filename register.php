<?php include("includes/header.php"); ?>
<?php if ($session->is_signed_in()) redirect("index"); ?>
<?php
$msg_err = "";
if (isset($_POST['register'])) {

    $user->username = $_POST['user'];
    $user->email = $_POST['email'];
    $user->user_role = "subscriber";

    $user_exists = $user->verify_user($_POST['user'], $_POST['email']);

    $password = $_POST['password'];
    $confirm_pass = $_POST['password01'];

     $user->set_file($_FILES['profile_img']);

    if ($password == $confirm_pass && strlen($password) >= 6 && strlen($confirm_pass) >= 6 && strlen($user->username) >= 4) {

        $options = array("cost" => 12);

        $password =  password_hash($confirm_pass, PASSWORD_BCRYPT, $options);

        $user->password = $password;


        if ($user_exists->username == $user->username) {
            $msg_err =  "User already exists";
        }
        if ($user_exists->email == $user->email) {
            $msg_err =  "Email already exists";
        }
        if (!$user_exists->email && !$user_exists->username) {
            if ($user->create()) {
                redirect("login");
            };
        }
    }
}

?>
<section class="py-3 py-md-5 py-xl-8">

    <?php include("includes/loadingSpinner.php") ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container d-flex justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-12 bsb-overlay background-position-center background-size-cover" style="--bsb-overlay-opacity: 0.7;">
                    <div class="col-12">
                        <div class="rounded shadow-sm overflow-hidden text-light">
                            <div class="row align-items-lg-center h-100 ">
                                <div class="col-12 ">
                                    <div class="row gy-3 gy-xl-3 p-3 p-xl-3">
                                        <h1 class="text-center">Register</h1>

                                        <p class="email-text-err text-center"></p>
                                        <p class="text-danger text-center"><?php echo  $msg_err; ?></p>
                                        <div class="col-8">
                                            <label for="email" class="form-label">Email <span class="text-danger email_validator">*</span></label>
                                            <input type="email" class="form-control email" id="email" name="email" value="" required>
                                        </div>
                                        <div class="col-4">
                                            <label for="email" class="form-label">Selection <span class="text-danger selector_validator">*</span></label>
                                            <select class="form-select" name="" id="email_selection">
                                                <option value="">Select Email Type</option>
                                                <hr>
                                                <option value="@yahoo.com">Yahoo</option>
                                                <option value="@mail.com">Mail</option>
                                                <option value="@hotmail.com">Hotmail</option>
                                                <option value="@gmail.com">Gmail</option>
                                            </select>
                                        </div>
                                        <div class="col-8">
                                            <p class="user-validation-text text-center"></p>
                                            <label for="username" class="form-label">User Name <span class="text-danger user_validation">*</span></label>
                                            <input type="text" class="form-control" id="username" name="user" value="" required>
                                        </div>
                                        <div class="col-4">
                                            <p class="user-validation-text text-center"></p>
                                            <label for="profile" class="form-label">Profile Picture <span>(Optional)</span></label>
                                            <input type="file" class="form-control" name="profile_img">
                                        </div>
                                        <p class="text-validation text-center"></p>
                                        <div class="col-6">
                                            <label for="password" class="form-label">Password <span class="text-danger password_validation">*</span></label>
                                            <input type="password" class="form-control pass" id="password" name="password" value="" required>
                                        </div>
                                        <div class="col-6">
                                            <label for="password" class="form-label">Confirm Password <span class="text-danger password_validation01">*</span></label>
                                            <input type="password" class="form-control pass01" id="password01" name="password01" value="" required>
                                        </div>
                                      
                                        <div class="col-4"></div>
                                        <div class="col-4">
                                            <div class="d-grid">
                                                <button class="btn btn-primary btn-lg register-btn" name="register" type="submit">Sign Up</button>
                                            </div>
                                        </div>
                                        <div class="col-4"></div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </form>
</section>
<br>

<script>
    const register = document.querySelector('.register-btn');
    const overlay = document.querySelector('.overlay');

    register.addEventListener('click', function(e) {

        overlay.hidden = false;
        setTimeout(() => {
            overlay.hidden = true;
        }, 3000);
    });




    const pass = document.getElementById('password');
    const confirm_pass = document.getElementById('password01');
    const text_validation = document.querySelector('.text-validation');
    const password_validation = document.querySelector('.password_validation');
    const password_validation01 = document.querySelector('.password_validation01');


    const arr = [pass, confirm_pass];
    arr.forEach(function(input) {
        input.addEventListener('change', function(e) {
            e.preventDefault();
            if (pass.value.length >= 6 && confirm_pass.value.length >= 6 && pass.value == confirm_pass.value) {
                text_validation.style.color = 'lightgreen';
                text_validation.textContent = "Passwords Match";
                password_validation.textContent = "✅";
                password_validation01.textContent = "✅";


            } else if (pass.value.length < 6 && confirm_pass.value.length < 6) {
                text_validation.style.color = "#EA4E4D";
                text_validation.textContent = "Password has to be at least 6 Characters";
                password_validation.textContent = "*";
                password_validation01.textContent = "*";
            }
            if (pass.value !== confirm_pass.value) {
                text_validation.style.color = "#EA4E4D";
                text_validation.textContent = "Passwords do not Match";
                password_validation.textContent = "*";
                password_validation01.textContent = "*";
            }

        });
    });


    const username = document.getElementById('username');
    const user_validation = document.querySelector('.user_validation');
    const user_validation_text = document.querySelector('.user-validation-text');

    username.addEventListener('change', function(e) {

        if (username.value.length >= 4) {
            user_validation.textContent = "✅";
            user_validation_text.style.color = 'lightgreen';
            user_validation_text.textContent = "Username Valid";
        } else {
            user_validation.innerHTML = `<span class="text-danger user_validation">*</span>`;
            user_validation_text.style.color = "#EA4E4D";
            user_validation_text.textContent = "Username must be at least 4 characters";
        }
    });



    const email = document.getElementById('email');
    const selector = document.getElementById('email_selection');
    const email_validation = document.querySelector('.email_validator');
    const selector_validation = document.querySelector('.selector_validator');


    selector.addEventListener('change', function(e) {
        e.preventDefault();
        email.value = selector.value;
        email.type = 'text';
        email.focus();
        email.setSelectionRange(0, 0);
        email.type = 'email';

    });


    const email_checker = document.querySelector('.email-text-err');

    const inputs = [email, selector];

    inputs.forEach(function(inp) {
        inp.addEventListener('change', function(e) {


            function validateEmail(email) {
                const regex = /^[^\s@]+@[^\s@]+$/;
                return regex.test(email);
            }

            if (validateEmail(email.value)) {
                email_validation.innerHTML = `✅`;
                selector_validation.innerHTML = `✅`;
                email_checker.textContent = "Email Valid";
                email_checker.style.color = "lightgreen";

            } else {
                email_validation.innerHTML = `*`;
                selector_validation.innerHTML = `*`;
                email_checker.textContent = "Email cannot be Empty";
                email_checker.style.color = "#EA4E4D";
            }

        });
    });
</script>
<?php include("includes/footer.php"); ?>
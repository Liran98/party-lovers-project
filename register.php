<?php include("includes/header.php"); ?>
<?php if ($session->is_signed_in()) redirect("index"); ?>
<?php

if (isset($_POST['register'])) {

    $user->username = $_POST['user'];
    $user->email = $_POST['email'];
    $user->user_role = "subscriber";


    $password = $_POST['password'];
    $confirm_pass = $_POST['password01'];

    if ($password == $confirm_pass && strlen($password) >= 6 && strlen($confirm_pass) >= 6 && strlen($user->username) >= 4) {

        $options = array("cost" => 12);

        $password =  password_hash($confirm_pass, PASSWORD_BCRYPT, $options);

        $user->password = $password;

        if ($user->create()) {
            redirect("login");
        };
    }
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

                                        <p class="email-text-err text-center"></p>
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
                                        <div class="col-12">
                                            <p class="user-validation-text text-center"></p>
                                            <label for="username" class="form-label">User Name <span class="text-danger user_validation">*</span></label>
                                            <input type="text" class="form-control" id="username" name="user" value="" required>
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

<script>
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
                text_validation.style.color = 'red';
                text_validation.textContent = "Password has to be at least 6 Characters";
                password_validation.textContent = "*";
                password_validation01.textContent = "*";
            }
            if (pass.value !== confirm_pass.value) {
                text_validation.style.color = 'red';
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
            user_validation_text.style.color = 'red';
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
    const validators = [email_validation, selector_validation];

    inputs.forEach(function(btn, i) {
        btn.addEventListener('change', function(e) {
            e.preventDefault();
       
            if (email.value.length >= 3 && email.value.includes("@")) {
                validators[i].innerHTML = `✅`;
                email_checker.textContent = "Email Valid";
                email_checker.style.color = "lightgreen";

            } else {
                validators[i].innerHTML = `*`;
                email_checker.textContent = "Email cannot be Empty";
                email_checker.style.color = "red";
            }

        });
    })
</script>
<?php include("includes/footer.php"); ?>
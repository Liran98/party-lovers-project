<?php include("includes/header.php"); ?>
<section class="py-3 py-md-5 py-xl-8 m-4 p-4">
    <div class="container-fluid d-flex justify-content-center">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-8">
                <div class="rounded shadow-sm overflow-hidden text-light m-3">
                    <h3 class="text-center m-3 text-light">Edit User</h3>
                    <div class="row align-items-lg-center h-100 ">
                        <div class="col-12 ">

                            <?php

                            if (isset($_GET['edit'])) {

                                $val = $user->find_by_id($_GET['edit']);

                            ?>

                                <form action="" method="post">
                                    <div class="row gy-4 gy-xl-5 p-4 p-xl-5">

                                        <div class="col-6">
                                            <label for="username" class="form-label">User Name</label>
                                            <input type="text" class="form-control user-input" name="username" value="<?php echo $val->username; ?>" required>
                                            <p class="user_validation"></p>
                                        </div>


                                        <div class="col-5">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control password" name="password" value="" required>
                                            <p class="password_validation"></p>
                                        </div>

                                        <div class="col-1 my-6">
                                            <a class="show-password" href=""><i class="fa fa-eye-slash display-6 my-4"></i></a>
                                        </div>

                                        <div class="col-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control email-input" name="email" value="<?php echo $val->email; ?>" required>
                                            <p class="email_validation"></p>
                                        </div>
                                        <div class="col-6">
                                            <label for="role" class="form-label">User Role</label>
                                            <select class="form-select" name="user_role" id="">
                                                <option value="<?php echo $val->user_role; ?>" selected>Selected: <?php echo $val->user_role; ?></option>
                                                <p>
                                                    <hr>
                                                </p>
                                                <option value="Admin">Admin</option>
                                                <option value="Subscriber">Subscriber</option>

                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button name="Update_user" class="btn btn-primary btn-lg" type="submit">Update User</button>
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
    <?php


    if (isset($_POST['Update_user'])) {

        $user->username = $_POST['username'];

        $user->email = $_POST['email'];

        $password = $_POST['password'];

        if (strlen($password) >= 6 && strlen($_POST['username']) >= 4 && !empty($_POST['email'])) {
            $user->password  = password_hash($_POST['password'], PASSWORD_BCRYPT, array("cost" => 12));

            $user->user_role = $_POST['user_role'];

            $user->update($_GET['edit']);

            redirect("all_users");
        } else {
        }
    }
    ?>
</section>
<br>

<script>
    // ! <SHOW AND HIDE PASSWORD FOR EDIT_USER.PHP>
    const show_pass = document.querySelector('.show-password');
    const password = document.querySelector('.password');

    let visible = false;

    show_pass.addEventListener('click', function(e) {
        e.preventDefault();
        show_pass.innerHTML = "";

        if (!visible) {
            password.type = 'text';
            show_pass.insertAdjacentHTML('afterbegin', "<i class='fa fa-eye display-6 my-4'></i>");
        } else {
            password.type = 'password';
            show_pass.insertAdjacentHTML('afterbegin', "<i class='fa fa-eye-slash display-6 my-4'></i>");
        }

        visible = !visible;

    });
    // ! </SHOW AND HIDE PASSWORD FOR EDIT_USER.PHP>



    const user_text = document.querySelector('.user_validation');
    const password_text = document.querySelector('.password_validation');
    const email_text = document.querySelector('.email_validation');

    const user_input = document.querySelector('.user-input');
    const email_input = document.querySelector('.email-input');


    user_input.addEventListener('change', function(e) {
        if (user_input.value.length < 4) {
            user_text.style.color = "#EA4E4D";
            user_text.textContent = 'Username must be at least 4 characters';
        }else{
            user_text.style.color = "lightgreen";
            user_text.textContent = 'Username valid';
        }
    });

    password.addEventListener('change', function(e) {
        if (password.value.length < 6) {
            password_text.style.color = "#EA4E4D";
            password_text.textContent = 'Passowrd must be at least 6 characters';
        }else{
            password_text.style.color = "lightgreen";
            password_text.textContent = 'Password valid';
        }
    });


    function validateEmail(email) {
                const regex = /^[^\s@]+@[^\s@]+$/;
                return regex.test(email);
            }



    email_input.addEventListener('change', function(e) {
        if (!validateEmail(email_input.value)) {
            email_text.style.color = "#EA4E4D";
            email_text.textContent = 'Email not valid';
        }else{
            email_text.style.color = "lightgreen";
            email_text.textContent = 'Email valid';
        }
    });



 
</script>
<?php include("includes/footer.php"); ?>
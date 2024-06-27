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

                                $user_id = $user->find_by_id($_GET['edit']);
                                foreach ($user_id as $val) {
                            ?>

                                    <form action="" method="post">
                                        <div class="row gy-4 gy-xl-5 p-4 p-xl-5">

                                            <div class="col-6">
                                                <label for="username" class="form-label">User Name</label>
                                                <input type="text" class="form-control" name="username" value="<?php echo $val->username; ?>" required>
                                            </div>
                                            <div class="col-5">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control password" name="password" value="<?php echo $val->password; ?>" required>
                                            </div>

                                            <div class="col-1 my-6">
                                                <a class="show-password" href=""><i class="fa fa-eye-slash display-6 my-4"></i></a>
                                            </div>
                                            <div class="col-6">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" value="<?php echo $val->email; ?>" required>
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
        $user->password  = $_POST['password'];
        $user->user_role = $_POST['user_role'];

        $user->update($_GET['edit']);

        redirect("all_users");
    }
    ?>
</section>
<br>

<script>
   
</script>
<?php include("includes/footer.php"); ?>
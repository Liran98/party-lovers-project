<?php include("includes/header.php"); ?>

<section class="py-3 py-md-5 py-xl-8">

  <div class="container d-flex justify-content-center">
    <div class="row">
      <div class="col-12">
        <div class="rounded shadow-sm overflow-hidden text-light">
          <h1 class="text-center">Login</h1>
          <div class="row align-items-lg-center h-100 ">
            <div class="col-12 ">


              <form action="" method="post">
                <div class="row gy-4 gy-xl-5 p-4 p-xl-5">

                  <div class="col-12">
                    <label for="user" class="form-label">User Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="user" name="user" value="" required>
                  </div>


                  <div class="col-12">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" value="" required>
                  </div>

                  <div class="col-12">
                    <div class="d-grid">
                      <button name="login" class="btn btn-primary btn-lg" type="submit">Login</button>
                    </div>
                    <br>
                    <a class="btn btn-info btn-outline-dark" href="register.php">No Account ? sign up</a>
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

if (isset($_POST['login'])) {

  $user->username = $_POST['user'];
  $user->password = $_POST['password'];

    $user->verify_user();
 
}


?>







<?php include("includes/footer.php"); ?>
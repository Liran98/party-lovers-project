<?php include("includes/header.php"); ?>
<?php if ($session->is_signed_in()) redirect("index"); ?>
<?php
$msg = "";
$msg_user = "";

if (isset($_POST['login'])) {

  $username =  trim($_POST['user']);
  $password = trim($_POST['pass']);

  $user_found = $user->verify_user($username);

  $stored_password = "";
  $current_user = "";

  if ($user_found) {

    $stored_password = $user_found->password;
    $current_user = $user_found;
  } else {
    $msg_user = "invalid Username";
  }


  if ($stored_password && password_verify($password, $stored_password)) {
    $session->login($current_user);

    redirect("admin/index");
  } else {
    $msg = "Password not valid";
  }
}
?>
<section class="py-3 py-md-5 py-xl-8 ">

<?php include("includes/loadingSpinner.php") ?>

  <div class="container d-flex justify-content-center">
    <div class="row">
      <div class="col-12 col-lg-12 bsb-overlay" style="--bsb-overlay-opacity: 0.7;">
        <div class="col-12">
          <div class="rounded shadow-sm overflow-hidden text-light">
            <h1 class="text-center">Login</h1>
            <div class="row align-items-lg-center h-100 ">
              <div class="col-12 ">


                <form action="" method="post">
                  <div class="row gy-4 gy-xl-5 p-4 p-xl-5">

                    <div class="col-12">
                      <p class="text-danger text-center"><?php echo $msg_user; ?></p>
                      <label for="user" class="form-label">User Name <span class="text-danger validator">*</span></label>
                      <input type="text" class="form-control username" id="user" name="user" value="" required>
                    </div>


                    <div class="col-12">
                      <p class="text-danger text-center"><?php echo $msg; ?></p>
                      <label for="password" class="form-label">Password <span class="text-danger validator">*</span></label>
                      <input type="password" class="form-control password" id="password" name="pass" value="" required>
                    </div>

                    <div class="col-12">
                      <div class="d-grid">
                        <button name="login" class="btn btn-primary btn-lg login-btn" type="submit">Login</button>
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
  </div>
</section>
<br>
<script>
  const login = document.querySelector('.login-btn');

  const overlay = document.querySelector('.overlay');

  login.addEventListener('click', function(e) {
   
    overlay.hidden = false;
    setTimeout(() => {
      overlay.hidden = true;
    }, 3000);

  });




   const username = document.querySelector('.username');
    const password = document.querySelector('.password');
     const validation = document.querySelectorAll('.validator');

    const inputs = [username, password];

    inputs.forEach(function(input,i) {
      
      input.addEventListener('change', function (e){
        if(input.value.length == 0){
          validation[i].innerHTML="*";
        }else{
          validation[i].innerHTML="✅";
        }
        });
    })
</script>

<?php include("includes/footer.php"); ?>
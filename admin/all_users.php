<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) redirect("../index"); ?>
<div class="col-2"></div>
<div class="main-content col-10">
    <div class="container-fluid mt-7">
        <!-- Table -->

        <!-- Dark table -->
        <div class="col">
            <div class="bg-default shadow">
                <div class="card-header bg-transparent border-0">
                    <h3 class="text-white mb-0">All Users</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-dark table-flush">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Delete</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $all_users = $user->find_all();

                            foreach ($all_users as $users) {

                            ?>
                                <tr>
                                    <td>
                                        <div class="media-body">
                                            <span class="mb-0 text-sm"><?php echo $users->id; ?></span>
                                        </div>
                                    <td>
                                        <div class="media-body">
                                            <span class="mb-0 text-sm"><?php echo $users->username; ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo $users->email; ?>
                                    </td>
                                    <td>
                                        <?php echo $users->user_role; ?>
                                    </td>


                                    <?php

                                    if ($session->user_id == $users->id) {
                                    ?>
                                        <td>
                                            <a data-user="<?php echo $users->id; ?>" href="all_users.php?del=<?php echo $users->id; ?>" class="del-btn"> <i class="fas fa-trash p-2"></i> </a>
                                        </td>
                                        <td>
                                            <a href="edit_user.php?edit=<?php echo $users->id; ?>"> <i class="fas fa-edit p-2"></i> </a>
                                        </td>
                                    <?php
                                    }
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php


if (isset($_GET['edit'])) {
    $user->find_by_id($_GET['edit']);
}

if (isset($_GET['del'])) {

    $user_img = $user->find_by_id($_GET['del']);
    
    $img_path = "../" .  $user_img->img_path();

    if ($user->delete($_GET['del'])) {

        $user->delete_user_carts($_GET['del']);

        $session->logout();

        if (is_file($img_path)) {
            if (unlink($img_path)) {
                redirect("../index");
            }
        }
    }
}

?>

<script>
    const delete_user = document.querySelector('.del-btn');

    delete_user.addEventListener('click', function(e) {
        e.preventDefault();
        const btn = e.target.closest('.del-btn');
        const user_id = btn.dataset.user;
        Swal.fire({
            title: "Delete User ?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.isConfirmed) {

                fetch(`all_users.php?del=${user_id}`)
                    .then(function(res) {
                        res.json();
                    })
                    .then(function() {
                        setTimeout(() => {
                            window.location.href = "../index.php";
                        }, 400);
                    });
            }
        });

    });
</script>
<?php include("includes/footer.php"); ?>
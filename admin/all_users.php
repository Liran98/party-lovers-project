<?php include("includes/header.php"); ?>

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
                                    
                                    if(isset($_SESSION['id']) && $_SESSION['id'] == $users->id){
                                    ?>
                                    <td>
                                        <a href="all_users.php?del=<?php echo $users->id; ?>" class="del-btn"> <i class="fas fa-trash p-2"></i> </a>
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




if (isset($_GET['del'])) {
    $uid = $user->find_by_id($_GET['del']);
    foreach ($uid as $theuser) {
        // if ($theuser->username == $_SESSION['username']) {
        //     $user->delete($_GET['del']);
        // }
    }
}



?>


<?php include("includes/footer.php"); ?>
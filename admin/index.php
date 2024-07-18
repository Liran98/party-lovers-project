<?php include("includes/header.php"); ?>

<?php if (!$session->is_signed_in() || !$session->user_id) redirect("../index"); ?>

<div id="layoutSidenav_content">
    <main class="text-light">
        <div class="container-fluid px-4">
            <h1 class="mt-4 text-center">Dashboard</h1>
            <div class="row">
                <?php
                $logged_user = $user->find_by_id($session->user_id);
                if($logged_user->user_role == 'Admin' ){
                    ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">All Events</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="all_events.php">View Details</a>
                            <h4 class="text-right p-3"> <?php echo $event->count_all(); ?></h4>

                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body ">All Packages</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="all_packages.php">View Details</a>
                            <h4 class="text-right p-3"> <?php echo $package->count_all(); ?></h4>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body ">All Users</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="all_users.php">View Details</a>
                            <h4 class="text-right p-3">
                                <?php echo $user->count_all(); ?>
                            </h4>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
    </main>

    <div>
        <canvas style="width: auto; background-color:aliceblue; margin:80px;" id="myChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        <?php
        $all_events = $event->count_all();
        $all_packages = $package->count_all();
        $all_users = $user->count_users_role('subscriber');
        $all_admins = $user->count_users_role('admin');
        ?>

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Events', 'Packages', 'Subscriber (Regular account)', 'Admins'],
                datasets: [{
                    label: '# Count',
                    data: [
                        <?php echo $all_events; ?>,
                        <?php echo $all_packages; ?>,
                        <?php echo $all_users; ?>,
                        <?php echo $all_admins; ?>
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>



    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Party Lovers <?php echo date("Y") ?></div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>

<?php include("includes/footer.php"); ?>
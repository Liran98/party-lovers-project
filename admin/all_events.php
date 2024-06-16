<?php include("includes/header.php"); ?>

<div class="col-2"></div>
<div class="main-content col-10">
  <div class="container mt-7">
    <!-- Table -->

    <!-- Dark table -->
    <div class="col">
      <div class="bg-default shadow">
        <div class="card-header bg-transparent border-0">
          <h3 class="text-white mb-0">All Events</h3>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-dark table-flush">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Theme</th>
                <th scope="col">Description</th>
                <th scope="col">Package Id</th>
                <th scope="col">Event Id</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $all_events = $event->find_all();

              foreach ($all_events as $events) {

              ?>
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <a href="all_events.php?del=<?php echo $events->id; ?>" class="avatar rounded-circle mr-3 bg-dark">
                        <img src="<?php echo "../" . $events->img_path(); ?>">
                      </a>
                      <div class="media-body">
                        <span class="mb-0 text-sm"><?php echo $events->title; ?></span>
                      </div>
                    </div>
                  </th>
                  <td>
                    <?php echo $events->theme_type; ?>
                  </td>
                  <td>
                    <h6><?php echo $events->description; ?></h6>
                  </td>
                  <td>
                    <?php echo $events->package_id; ?>
                  </td>
                  <td>
                    <div class="d-flex align-items-center">
                      <?php echo $events->id; ?>
                      <div>

                      </div>
                    </div>
                  </td>
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

  // $event->delete($_GET['del']);

  $event->delete_img();
}


?>

<?php include("includes/footer.php"); ?>
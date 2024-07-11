<?php include("includes/header.php"); ?>

<div class="col-2"></div>
<div class="main-content col-10">
  <div class="container-fluid mt-7">
    <!-- Table -->
    <form action="" method="post">


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
                  <input type="checkbox" class="m-2 checkbox_all_events">
                  <input hidden type="submit" class="btn btn-danger del-events m-2" name="delete-events" value="Delete All Events">
                  <th scope="col">IMG</th>
                  <th scope="col">Title</th>
                  <th scope="col">Theme</th>
                  <th scope="col">Package Id</th>
                  <th scope="col">Event Id</th>
                  <th scope="col">Delete</th>
                  <th scope="col">Edit</th>
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
                        <input type="checkbox" class="m-2 check-event" name="checkboxes[]" value="<?php echo $events->id; ?>">
                        <img class="avatar rounded-circle mr-3 bg-dark" src="   
                      <?php
                      echo "../" . $events->img_path();
                      ?>">
                      </div>
                    </th>
                    <td>
                      <?php echo $events->title; ?>
                    </td>
                    <td>
                      <?php echo $events->theme_type; ?>
                    </td>

                    <td>
                      <?php echo $events->package_id; ?>
                    </td>
                    <td>
                      <?php echo $events->id; ?>

          </div>
        </div>
        </td>
        <td>
          <a href="all_events.php?del=<?php echo $events->id; ?>"> <i class="fas fa-trash p-2"></i></a>
        </td>
        <td>
          <a href="edit_event.php?edit=<?php echo $events->id; ?>"><i class="fas fa-edit p-2"></i> </a>
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
</form>
</div>
</div>
<?php




if (isset($_GET['del'])) {
  if ($event->delete_img($_GET['del'])) {
    redirect("all_events");
  };
};


if (isset($_POST['delete-events'])) {

  if (!empty($_POST['checkboxes']) && is_array($_POST['checkboxes'])) {
    $events_id = $_POST['checkboxes'];

    foreach ($events_id as $eid) {
      $event->delete($eid);
      redirect("all_events");
    }
  }
}


?>
<script>
  const btn_checkbox = document.querySelector('.checkbox_all_events');
  const btn_per_event = document.querySelectorAll('.check-event');
  const delete_event = document.querySelector('.del-events');


  let is_checked = false;
  btn_checkbox.addEventListener('click', function(e) {


    if (!is_checked) {
      delete_event.hidden = false;
      btn_per_event.forEach(function(btn) {
        btn.checked = true;
      });
    } else {
      delete_event.hidden = true;
      btn_per_event.forEach(function(btn) {
        btn.checked = false;
      });
    }

    is_checked = !is_checked;


  });
</script>

<?php include("includes/footer.php"); ?>
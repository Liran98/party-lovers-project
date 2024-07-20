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
                  $all_event_img = "";
                  if (!empty($events->event_image)) {
                    $all_event_img = "../" .  $events->img_path();
                  } else {
                    $all_event_img = "../images/placeholder-image.jpg";
                  }
                ?>
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                        <input hidden type="checkbox" class="m-2 check-event" name="checkboxes[]" value="<?php echo $events->id; ?>">
                        <img class="avatar rounded mr-3 bg-dark" src="   
                      <?php
                      echo  $all_event_img;
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
          <a class="delete-event" data-event="<?php echo $events->id; ?>" href="all_events.php?del=<?php echo $events->id; ?>"> <i class="fas fa-trash p-2 text-danger"></i></a>
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
  $event_img = $event->find_by_id($_GET['del']);
  $event_img_path = "../" . $event_img->img_path();
  if ($event->delete($_GET['del'])) {
    if (is_file($event_img_path)) {
      if (unlink($event_img_path)) {
        redirect("all_events");
      }
    }
  };
}



if (isset($_POST['delete-events'])) {

  if (!empty($_POST['checkboxes']) && is_array($_POST['checkboxes'])) {
    $events_id = $_POST['checkboxes'];

    foreach ($events_id as $eid) {
      $eid_img = $event->find_by_id($eid);
      $img_path = "../" .  $eid_img->img_path();
      if ($event->delete($eid)) {
        if ($event->delete($eid)) {
          if (!empty($img_path) && is_file($img_path)) {
              unlink($img_path);
          }
          redirect("all_events");
      }
      };
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
        btn.hidden = false;
      });
    } else {
      delete_event.hidden = true;
      btn_per_event.forEach(function(btn) {
        btn.checked = false;
        btn.hidden = true;
      });
    }

    is_checked = !is_checked;


  });


  const del_event = document.querySelectorAll('.delete-event');
  del_event.forEach(function(val) {
    val.addEventListener('click', function(e) {
      e.preventDefault();
      const btn = e.target.closest('.delete-event');
      const event_id = btn.dataset.event;
      Swal.fire({
        title: "Delete Event ?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then(function(result) {
        if (result.isConfirmed) {

          fetch(`all_events.php?del=${event_id}`)
            .then(function(res) {
              res.json();
            })
            .then(function() {
              setTimeout(() => {
                window.location.href = "all_events.php";
              }, 400);
            });
        }
      });

    });
  });
</script>

<?php include("includes/footer.php"); ?>
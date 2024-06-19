<?php include("../includes/init.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <?php include("navigation.php"); ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark text-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Main Page</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>


                            <div class="sb-sidenav-menu-heading">Add/Edit Event</div>

                                    <a class="nav-link" href="add_event.php"><i class="fas fa-plus p-2"></i> Add Event</a>
                                  
                                    <a class="nav-link" href="edit_event.php">  <i class="fas fa-edit p-2"></i>  Edit Event </a>
                                    <a class="nav-link" href="all_events.php">  <i class="fas fa-box p-2"></i> All Events</a>



                            
                            <div class="sb-sidenav-menu-heading">Add/Edit Package</div>
                           
                        
                                    <a class="nav-link" href="add_package.php"> <i class="fas fa-plus p-2"></i>Add Package</a>
                                    <a class="nav-link" href="edit_package.php"> <i class="fas fa-edit p-2"></i> Edit Package</a>
                                    <a class="nav-link" href="all_packages.php"> <i class="fas fa-box p-2"></i> All Packages</a>

                            </div>
                    
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       "place holder for user"
                    </div>
                </nav>
            </div>
<?php

include '../phpa/conn.php';
	if (empty($_SESSION['admin'])) {
		// Session exists
	 header("location:../admin_login.html");
	 exit();

	}

  $Users=$conn->query("SELECT * from user");
  $totalUser=mysqli_num_rows($Users);

  $Tickets=$conn->query("SELECT * from ticket order by t_id desc limit 7");
  $totalTickets=mysqli_num_rows($Tickets);

  $payedTickets=$conn->query("SELECT * from ticket where t_status=3");
  $totalPayedTickets=mysqli_num_rows($payedTickets);

  $bookedTickets=$conn->query("SELECT * from ticket where t_status=0");
  $totalBookedTickets=mysqli_num_rows($bookedTickets);

  $activated=$conn->query("SELECT * from subscription");
  $totalActivated=mysqli_num_rows($activated);

  $paidActivation=$conn->query("SELECT * from subscription where s_status=2");
  $totalPaidActivation=mysqli_num_rows($paidActivation);
	 
  $messages=$conn->query("SELECT * from contact");
  $totalMessage=mysqli_num_rows($messages);


// Get the date 30 days ago
$thirtyDaysAgo = date("Y-m-d", strtotime("-30 days"));

// Query to get users created in the last 30 days
$usersLast30Days = $conn->query("SELECT * FROM user WHERE created_at >= '$thirtyDaysAgo'");
$totalUsersLast30Days = mysqli_num_rows($usersLast30Days);

// Query to get tickets created in the last 30 days
$ticketsLast30Days = $conn->query("SELECT * FROM ticket WHERE created_at >= '$thirtyDaysAgo'");
$totalTicketsLast30Days = mysqli_num_rows($ticketsLast30Days);

// Query to get paid tickets created in the last 30 days
$paidTicketsLast30Days = $conn->query("SELECT * FROM ticket WHERE t_status = 3 AND created_at >= '$thirtyDaysAgo'");
$totalPaidTicketsLast30Days = mysqli_num_rows($paidTicketsLast30Days);

// Query to get booked tickets created in the last 30 days
$bookedTicketsLast30Days = $conn->query("SELECT * FROM ticket WHERE t_status = 0 AND created_at >= '$thirtyDaysAgo'");
$totalBookedTicketsLast30Days = mysqli_num_rows($bookedTicketsLast30Days);

// Query to get messages received in the last 30 days
$messageLat30Days=$conn->query("SELECT * FROM contact WHERE created_at >= '$thirtyDaysAgo'");
$totalMessageLast30Days = mysqli_num_rows($messageLat30Days);

//Query to get subscrption last 30 days
$activatedLast30Days=$conn->query("SELECT * FROM subscription WHERE created_at >= '$thirtyDaysAgo'");
$totalActivatedLast30Days = mysqli_num_rows($activatedLast30Days);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashbord-Admin</title>
  
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- endinject -->
  <!-- <link rel="shortcut icon" href="images/favicon.png" /> -->
  <style>
     canvas {
      max-width: 400px;
      margin: 0 auto;
      max-height: 300px;
    }
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        z-index: 2;
    }
    .popups {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            z-index: 2;
        }
        .popupz {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            z-index: 2;
        }
       
</style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
        <!--  <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li> -->
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face28.jpg" alt="profile"/>
       
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a href="php/logout.php" class="dropdown-item">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-settings d-none d-lg-flex">
            <a class="nav-link" href="#">
              <i class="icon-ellipsis"></i>
            </a>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li> -->
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Destinations</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="pages/forms/destination.php">Add destination</a></li>
                
              </ul>
            </div>
            
          </li>
          
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Chart of grouth</a></li>
              </ul>
            </div>
          </li> -->
         
          <li class="nav-item"> <a class="nav-link" href="pages/forms/agent.php">Agents</a></li>


        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome to Admin pannel</h3>
                  <h6 class="font-weight-normal mb-0">Now you are ready to get all information is system <span class="text-primary">KIGALI__TRAVEL</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> <?php
$date = date('l, F j, Y');
echo $date;
?>
                    </button>
                    <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - March</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div> -->
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">KIGALI</h4>
                        <h6 class="font-weight-normal">RWANDA</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                 <!-- popup of number of booking start -->
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                      <div class="card-body">
                          <p class="mb-4">New users Last 30 Days</p>
                          <p class="fs-30 mb-2"><?php echo$totalUsersLast30Days; ?></p>
                          <button type="button" class="btn btn-success mr-2" onclick="openPopup()">Show more</button>
                      </div>
                  </div>
              </div>
              <div class="overlay" id="overlay"></div>
<div class="popup" id="popup">
    <h4 class="card-title">New Users</h4>
    <!-- <p class="card-description"></p> -->
    <div class="table-responsive pt-3">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Created_at</th>
            </tr>
            
            </thead>
           <tbody>
                    
                      
                     <?php
                     $id=1;
                     while ($userData=mysqli_fetch_array($usersLast30Days)) {
                      $name=$userData['u_name'];
                      $email=$userData['u_email'];
                      $phone=$userData['u_phone'];
                      $at=$userData['created_at'];
                     echo  "<tr><td>$id</td><td>$name</td><td>$email</td><td>$phone</td><td>$at</td></tr>";
                     $id++;
                     }
                     ?>
                     
                    </tbody>
        </table>
    </div><br>
    <button onclick="closePopup()" class="btn btn-danger mr-2">Close</button>
</div>

<script>
    function openPopup() {
        document.getElementById("overlay").style.display = "block";
        document.getElementById("popup").style.display = "block";
    }

    function closePopup() {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("popup").style.display = "none";
    }
</script>
              <!-- popup of number of booking end -->

                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">New messages received Last 30 Days</p>
                      <p class="fs-30 mb-2"><?php echo $totalMessageLast30Days; ?></p>
                      <button type="submit" class="btn btn-success mr-2" onclick="openpay()">Show more</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="popups" id="popup_pay">
                <h4 class="card-title">Last 30 Days Tickets Booked</h4>
                <p class="card-description"></p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Names</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                           
                            <th>Received_at</th>
                        </tr>
                        </thead>
                        <tbody>
                      <?php
                      $i=1;
                      while($messageData=mysqli_fetch_array($messageLat30Days))
                      {

                        $email=$messageData['1'];  
                        $name=$messageData['2'];                    
                        $subject=$messageData['3'];
                        $message=$messageData['4'];                         
                        $at=$messageData['5'];
                        
                        echo '<tr>
                            <td>' . $i++ . '</td>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $subject . '</td>
                            <td>' . $message. '</td>
                          
                            <td>' . $at . '</td>
                        </tr>';
                      
                        
                        
                      }
                      ?>
                        </tbody>
                    </table>
                </div>
                <button onclick="close()" class="btn btn-danger mr-2">Close</button>
            </div>
            
            <script>
                function openpay() {
                    
                    document.getElementById("popup_pay").style.display = "block";
                }
            
                function close() {
                    
                    document.getElementById("popup_pay").style.display = "none";
                }
            </script>
            <!-- popup of number of donanas -->
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">New Tickets Payed Last 30 Days</p>
                      <p class="fs-30 mb-2"><?php echo $totalPaidTicketsLast30Days ?></p>
                      <button type="submit" class="btn btn-success mr-2" onclick="opendns()">Show more</button>
                    </div>
                  </div>
                </div>
                <div class="popupz" id="popup_dns">
                  <h4 class="card-title">Last 30 Days payed Tickets </h4>
                  <p class="card-description"></p>
                  <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Names</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>ID/Passport</th>
                            <th>Type</th>
                            <th>Country</th>
                            <th>Entrance date-time</th>
                            <th>Ticket_number</th>

                            <th>Booked_by</th>
                            <th>Booked_at</th>
                        </tr>
                        </thead>
                        <tbody>
                      <?php
                      $i=1;
                      while($payedData=mysqli_fetch_array($paidTicketsLast30Days))
                      {
                        $name=$payedData['1'];
                        $type=$payedData['2'];
                        $country=$payedData['3'];
                        $id=$payedData['4'];                         
                        $phone=$payedData['5']; 
                        $email=$payedData['6'];
                        $date=$payedData['7'];
                        $time=$payedData['8'];
                        $number=$payedData['9']; 
                        $by=$payedData['11'];
                        $at=$payedData['12'];
                        
                        echo '<tr>
                            <td>' . $i++ . '</td>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $phone . '</td>
                            <td>' . $id . '</td>
                            <td>' . $type . '</td>
                            <td>' . $country . '</td>
                            <td>' . $date . ' ' . $time . '</td>
                            <td>' . $number . '</td>
                            <td>' . $by . '</td>
                            <td>' . $at . '</td>
                        </tr>';
                      
                        
                        
                      }
                      ?>
                        </tbody>
                    </table>
                  </div>
                  <button onclick="closedns()" class="btn btn-danger mr-2">Close</button>
              </div>
                 <!-- popup of number of donanas -->
                 <div class="row">
                <div class="col-md-6 mb-4 mb-lg-1 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Subscription activated Last 30 Days</p>
                      <p class="fs-30 mb-2"><?php echo $totalActivatedLast30Days ?></p>
                      <button type="submit" class="btn btn-success mr-2" onclick="opendns()">Show more</button>
                    </div>
                  </div>
                </div>
                <div class="popupz" id="popup_dns">
                  <h4 class="card-title">Last 30 Days Subscriptions </h4>
                  <p class="card-description"></p>
                  <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Names</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>ID/Passport</th>
                            <th>Type</th>
                            <th>Country</th>                         
                            <th>Activated_by</th>
                            <th>Activated_at</th>
                        </tr>
                        </thead>
                        <tbody>
                      <?php
                      $i=1;
                      while($Activation=mysqli_fetch_array($activatedLast30Days))
                      {
                        $type=$Activation['1'];
                        $amount=$Activation['2'];
                        $name=$Activation['3'];                      
                        $email=$Activation['4'];                        
                        $phone=$Activation['5']; 
                        $country=$Activation['6'];                    
                        $id=$Activation['7']; 
                        $by=$Activation['8'];
                        $number=$Activation['10']; 
                     
                        $at=$Activation['11'];
                        
                        echo '<tr>
                            <td>' . $i++ . '</td>
                            <td>' . $name . '</td>
                            <td>' . $email . '</td>
                            <td>' . $phone . '</td>
                            <td>' . $id . '</td>
                            <td>' . $type . '</td>
                            <td>' . $country . '</td>
                         
                            <td>' . $number . '</td>
                            <td>' . $by . '</td>
                            <td>' . $at . '</td>
                        </tr>';
                      
                        
                        
                      }
                      ?>
                        </tbody>
                    </table>
                  </div>
                  <button onclick="closedns()" class="btn btn-danger mr-2">Close</button>
              </div>
              
              <script>
                  function opendns() {
                      
                      document.getElementById("popup_dns").style.display = "block";
                  }
              
                  function closedns() {
                      
                      document.getElementById("popup_dns").style.display = "none";
                  }
              </script>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Tickets Details</p>
                  <p class="font-weight-500">This graph is represent all activities was done on system like:booking,donate,payment</p>
                  <div class="d-flex flex-wrap mb-5">
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Users</p>
                      <h3 class="text-primary fs-30 font-weight-medium"><?php echo $totalUser ?></h3>
                    </div>
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Messages</p>
                      <h3 class="text-primary fs-30 font-weight-medium"><?php echo $totalMessage ?></h3>
                    </div>
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Subscriptions(monthly)</p>
                      <h3 class="text-primary fs-30 font-weight-medium"><?php echo $totalPaidActivation ?></h3>
                    </div>
                    <div class="mt-3">
                      <p class="text-muted">Tickets(daily)</p>
                      <h3 class="text-primary fs-30 font-weight-medium"><?php echo $totalPayedTickets?></h3>
                    </div> 
                  </div>
                  </div>
              </div>
              
            </div>
                  <canvas id="myChart"></canvas>

<script>
  const sub="<?php echo $totalPaidActivation  ?> ";
  const tick="<?php echo $totalPayedTickets  ?> ";

   // Function to generate an array of numbers from 1 to the limit
   const generateArray = (limit) => {
      const arr = [];
      for (let i = 1; i <= limit; i++) {
        arr.push(i);
      }
      return arr;
    };

  // Data for the chart
  const data = {
    labels: ['Subscriptions', 'Tickets'],
    datasets: [
      {
        label: 'Subscriptions',
        data: generateArray(sub), // Replace with your data
        backgroundColor: 'rgba(54, 162, 235, 0.5)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      },
      {
        label: 'Tickets',
        data: generateArray(tick), // Replace with your data
        backgroundColor: 'rgba(255, 99, 132, 0.5)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }
    ]
  };

  // Configuration options
  const options = {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  };

  // Get the canvas element
  const ctx = document.getElementById('myChart').getContext('2d');

  // Create the chart
  const myChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
  });
</script>
               
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Top Tickts</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                          <th>Ticket</th>
                          <th>Cost</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>  
                      </thead>
                      <tbody>
                       <?php
                        while($ticketData=mysqli_fetch_array($Tickets))
                        {
                          $date=$ticketData['created_at'];
                          $type=$ticketData['t_nationality'];
                       
                                              
                        $cost=$ticketData['t_nationality']=='others'?5000:1500;
                         
                          $number=$ticketData['9']; 
                          if ($ticketData['t_status'] == 3) {
                            $status = "<td class=\"font-weight-medium\"><div class=\"badge badge-success\">Paid</div></td>";
                        } elseif ($ticketData['t_status'] == 4) {
                            $status = "<td class=\"font-weight-medium\"><div class=\"badge badge-danger\">Used</div></td>";
                        } elseif ($ticketData['t_status'] == 2) {
                            $status = "<td class=\"font-weight-medium\"><div class=\"badge badge-danger\">Cancelled</div></td>";
                        } elseif ($ticketData['t_status'] == 0 || $ticketData['t_status'] == 1) {
                            $status = "<td class=\"font-weight-medium\"><div class=\"badge badge-warning\">Booked/Pending</div></td>";
                        } else {
                            // Handle any other cases if needed
                            $status = "<td class=\"font-weight-medium\"><div class=\"badge badge-secondary\">Unknown</div></td>";
                        }

                        
                        
                      ?>
                      <?php
                   echo "  <tr>
                          <td>$number </td>
                          <td class=\"font-weight-bold\">$$cost</td>
                          <td>$date</td>
                          $status
                        </tr>"                        ;
                                            }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">General User report</h4>
                <!-- <p class="card-description">
                  
                </p> -->
                <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          N<sup>o</sup>
                        </th>
                        <th>
                          Fullname
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Phone_number
                        </th>
                        <th>
                          Rgistered_at
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                     $id=1;
                     while ($userData=mysqli_fetch_array($Users)) {
                      $name=$userData['u_name'];
                      $email=$userData['u_email'];
                      $phone=$userData['u_phone'];
                      $at=$userData['created_at'];
                     echo  "<tr><td>$id</td><td>$name</td><td>$email</td><td>$phone</td><td>$at</td></tr>";
                     $id++;
                     }
                     ?>
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">General Ticket report</h4>
                <!-- <p class="card-description">
                  
                </p> -->
                <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          N<sup>o</sup>
                        </th>
                        <th>Names</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>ID/Passport</th>
                            <th>Type</th>
                            <th>Country</th>
                            <th>Entrance date-time</th>
                            <th>Ticket_number</th>

                            <th>Booked_by</th>
                            <th>Booked_at</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                               $T=$conn->query("SELECT * from ticket ");

                            $a=1;
                while ($tdata=mysqli_fetch_array($T)) {
                  $name=$tdata['1'];
                  $type=$tdata['2'];
                  $country=$tdata['3'];
                  $id=$tdata['4'];                         
                  $phone=$tdata['5']; 
                  $email=$tdata['6'];
                  $date=$tdata['7'];
                  $time=$tdata['8'];
                  $number=$tdata['9']; 
                  $by=$tdata['11'];
                  $at=$tdata['12'];
                 echo "  <tr>
                 <td>".$a++." </td>
                 <td>$name </td>
                 <td>$email </td>
                 <td>$phone </td>
                 <td>$id </td>
                 <td>$type</td>
                            <td>$country</td>
                            <td>$date $time</td>
                            <td>$number</td>
                            <td>$by</td>
                            <td>$at</td>
               </tr>";
               $a++;
                }
                ?>
                  
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Monthly subscribers</h4>
                <!-- <p class="card-description">
                  
                </p> -->
                <div class="table-responsive pt-3">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                          N<sup>o</sup>
                        </th>
                        <th>Names</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>ID/Passport</th>
                            
                            <th>Country</th>
                          
                            <th>Ticket_number</th>
                            <th>Type</th>
                            <th>Amount</th>

                            <th>Activated_by</th>
                            <th>Activated_at</th>
                            <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                               $T=$conn->query("SELECT * from subscription ");

                            $a=1;
                while ($Activation=mysqli_fetch_array($T)) {
                  $type=$Activation['1'];
                  $amount=$Activation['2'];
                  $name=$Activation['3'];                      
                  $email=$Activation['4'];                        
                  $phone=$Activation['5']; 
                  $country=$Activation['6'];                    
                  $id=$Activation['7']; 
                  $by=$Activation['8'];
                  $number=$Activation['10']; 
               $status=$Activation['9'];
                  $at=$Activation['11'];
                  switch ($status) {
                    case 1:
                      $status="<span class='badge badge-warning'>Pending</span>";
                      break;
                      case 2:
                        $status="<span class='badge badge-primary'>Active</span>";
                        break;
                    
                    default:
                      # code...
                        $status="<span class='badge badge-danger'>Expired</span>";
                        break;
                  }
                 echo "  <tr>
                 <td>".$a++." </td>
                 <td>$name </td>
                 <td>$email </td>
                 <td>$phone </td>
                 <td>$id </td>
                            <td>$country</td>
                 
                            <td>$number</td>
                 <td>$type</td>
                 <td>$amount</td>

                            <td>$by</td>
                            <td>$at</td>
                            <td>$status</td>
               </tr>";
               $a++;
                }
                ?>
                  
                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div>
        </footer>  -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>


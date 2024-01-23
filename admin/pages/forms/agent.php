<?php

include '../../php/conn.php';
	if (empty($_SESSION['admin'])) {
		// Session exists
	 header("location:../../../../admin_login.html");
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
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
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
        .link-button {
  background: none;
  border: none;
  padding: 0;
  font: inherit;
  color: blue;
  text-decoration: none;
  cursor: pointer;
}
.link-button:hover {
  text-decoration: none;
  color: darkblue;
}

</style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="../../images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../../images/logo-mini.svg" alt="logo"/></a>
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
              <img src="../../images/faces/face28.jpg" alt="profile"/>
       
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a href="../../php/logout.php" class="dropdown-item">
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
          
          <li class="nav-item">
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
          </li>

        </ul>
      </nav>
      <!-- partial -->
<style>
  #create{
    display: none;
  }
</style>

<div class="row" >
           
           <div class="col-2 "></div>
            <div class="col-6  grid-margin stretch-card" id="create">
              
              <div class="card bg-info" >
                <div class="card-body">
                  <h4 class="card-title">Create agents</h4>
                  <p class="card-description">
                
                 
                  <?php

if (isset($_POST['create'])) {

    $username=$_POST['username'];
    $password=$_POST['password'];
   $status="pending";
    
    $insert=$conn->query("INSERT into agent values('','$username','$password','$status',now())");
    if ($insert) {
    echo "  <span class=\"btn btn-success\">Agent creted well </span>
    <script>hideCreateArea();</script>
    ";
        
    }
    else {
        echo " <span class=\"btn btn-danger\">failed to create agent</span>";
    }
  }

?>
<style>
  .forms-sample input{
/* font-size: small; */
size: 60px;
  }
</style>
                  </span>
                  </p>
                 
                  <form method="post"  class="forms-sample" >
                   
                    <div class="form-group">
                      <label for="exampleInputCity1">Usernamesss</label>
                      <input type="text" class="form-control" required name="username" placeholder="enter agent username">
                    </div>
                    <div class="form-group">
                      <label for="exampleTextarea1">Password</label>
                      <input type="text" class="form-control" required name="password" >
                    </div>
                    <button type="submit" name="create" class="btn btn-primary mr-2">create</button>
                  
                  </form>
                </div>
              </div>
            </div>    
            <script>
              function showCreateArea(){
                document.getElementById('create').style.display="block";
                document.getElementById('btn').style.display="none";
              } function hideCreateArea()
              {
                document.getElementById('create').style.display="none";
                document.getElementById('btn').style.display="block";
              }
            </script>
           
            <button type="button" id="btn"  onclick="showCreateArea()" class="btn btn-success col-md-2 py-1">create new agent</button>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">Agents List <?php
                  
                  if (isset($_POST['aprove'])) {
                    $id=$_POST['id'];
                    $update=$conn->query("UPDATE agent set a_status='approved' where a_id='$id'");
                    if ($update) {
                      echo " <span class='btn btn-success'>approved </span>";
                    }
              
                  }
                  if (isset($_POST['cancel'])) {
                    $id=$_POST['id'];
                    $update=$conn->query("UPDATE agent set a_status='canceled' where a_id='$id'");
                    if ($update) {
                      echo " <span class='btn btn-success'>canceled </span>";
                    }
                       }
                  
                  ?></p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                        <tr>
                       
                          <th>Username</th>
                          <th>Password</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>  
                      </thead>
                      <tbody>
                       <?php
                       $Agent=$conn->query("SELECT * from agent");
                        while($agentData=mysqli_fetch_array($Agent))
                        {
                        $user=$agentData['a_username'];
                        $password=$agentData['a_password'];
                        $created=$agentData['created_at'];
                        $show=$agentData['a_status'];
                        $id=$agentData['a_id'];
                        
                          if ($agentData['a_status'] == "approved") {
                            $status = "<td class=\"font-weight-medium\"><div class=\"badge badge-success\">$show</div></td>";
                        } elseif ($agentData['a_status'] == "canceled") {
                            $status = "<td class=\"font-weight-medium\"><div class=\"badge badge-danger\"> $show</div></td>";
                        }
                        //  elseif ($agentData['a_status'] == "2") {
                        //     $status = "<td class=\"font-weight-medium\"><div class=\"badge badge-danger\">Cancelled</div></td>";
                        // } 
                        elseif ($agentData['a_status'] == "pending") {
                            $status = "<td class=\"font-weight-medium\"><div class=\"badge badge-warning\"> $show</div></td>";
                        } else {
                            // Handle any other cases if needed
                            $status = "<td class=\"font-weight-medium\"><div class=\"badge badge-secondary\">Unknown</div></td>";
                        }

                 
                    
                        echo "<tr>
                        <td>$user  </td>
                        

                        <td>$password</td>

                        $status
                        <td>
                          <form method='post'>
                            <input type='hidden' name='id' value='$id'>
                          
                            <button  name='approve' class='link-button '>Approvve</button> || 
                            <input type='hidden' value='$id'>
                            <button name='cancel' class='link-button'>Cancel</button>
                          </form>
                        </td>
                      </tr>";
                
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          
          <script>
  function copyText(text) {
    navigator.clipboard.writeText(text)
      .then(() => {
        alert("Copied to clipboard: " + text);
      })
      .catch(err => {
        console.error('Failed to copy: ', err);
      });
  }
</script>


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


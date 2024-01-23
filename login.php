<?php
include 'php/conn.php';
include 'php/loged.php';
?>
<!DOCTYPE HTML>
<html>
	<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kigali Travel &mdash; and Refound</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Nyandungu entrace tickets booking" />
	<meta name="keywords" content="Nyandungu Park, Ticket reservations, Entrance passes, Nyandungu entrance tickets, Booking tickets online, Rwandan attractions, Tourism in Rwanda, Adventure travel, Nyandungu landmark, Tourist experiences" />

	<meta name="author" content="FreeHTML5.co" />
	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<style>
        /* Add your styles for overlay and popup here */
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
			width: 100%;
            
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
		<div class="gtco-loader"></div>
	
	<!-- <div class="page-inner"> -->
		<nav class="gtco-nav" role="navigation">
			<div class="gtco-container">
				
				<div class="row">
					<div class="col-sm-4 col-xs-12">
						<div id="gtco-logo"><a href="index.php">Kigali &mdash; Traveler <em>.</em></a></div>
					</div>
					<div class="col-xs-8 text-right menu-1">
						<ul>
							<li><a href="destination.php">Destination</a></li>
							
							<!-- <li><a href="pricing.html">Pricing</a></li> -->
							<li><a href="contact.php">Contact</a></li>
							<li class="has-dropdown">
								<a href="#">account</a>
								<ul class="dropdown">
									<li><a href="login.php">Login</a></li>
									<li><a href="admin_login.html">Admin</a></li>
								</ul>
							</li>
						</ul>	
					</div>
				</div>
				
			</div>
		</nav>
	<div id="page">
		<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/rest.jpg)">
			<div class="overlay"></div>
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-12 col-md-offset-0 text-left">
						
		
						<div class="row row-mt-15em">
							<div class="col-md-7 mt-text animate-box" data-animate-effect="fadeInUp">
								<h1>Login or create new account when there's not</h1>	
							</div>
							
							<div class="col-md-4 col-md-push-1 animate-box" data-animate-effect="fadeInRight">

							<?php
if (isset($_POST['register'])) {
  // Get the data sent via AJAX
//   $data = $_POST['data'];
//   $data=explode(',',$data);
  $name = $_POST['name'];
  $email =   $_POST['email'];
  $phone =   $_POST['phone'];
  
  $password = $_POST['password1'];

  $select=$conn->query("SELECT u_email from user where u_email='$email'");
  if (mysqli_num_rows($select)==1) {
    echo "<span class=\"btn-danger\">Email Already used, preceed to login or use other email</span>";

  }
  else{
$insert=$conn->query("INSERT into user values(null,'$name','$phone','$email','$password',now())") or die("failed to save data =");
if($insert)  {
    $_SESSION['email']=$email;
echo "
<span class=\"btn-success\">
Account created well, redirecting ...</span>
<script> 

setTimeout(function(){
	window.location.href='user/';
},2000);
</script>
";
}
 
else
 {
  echo "<span class=\"btn-danger\">failed to create account.</span>";
}
 }
}
if (isset($_POST['login'])) {
	

	$email =   $_POST['email']; 
	$password = $_POST['password'];
  
	$select=$conn->query("SELECT * from user where u_email='$email' and u_password='$password' ");
	if (mysqli_num_rows($select))
	 {
	  
  $_SESSION['email']=$email;
  echo "<span class=\"btn-success\">Success, redirecting......</span>

  <script> 
  
  setTimeout(function(){
	  window.location.href='user/';
  },2000);
  </script>
  ";
	  
	}
	else{
	
  
	  echo "<span class=\"btn-danger\">Acount not found try again or create new account</span>";
	}
}
?>

								<div class="form-wrap">
									
									<div class="tab">
										
										<div class="tab-content">
											
											<div class="tab-content-inner active" data-content="signup">
												<h3>User Login </h3>
												<form method="post">
													<div class="row form-group">
														<div class="col-md-12">
															<label for="fullname">Email</label>
															<input type="email" name="email" class="form-control">
														</div>
													</div>
													
													<div class="row form-group">
														<div class="col-md-12">
															<label for="fullname">N<sup>o</sup>&mdash; Password</label>
															<input type="password" name="password" class="form-control">
														</div>
													</div>
													
		
													<div class="row form-group">
														<div class="col-md-12">
															<input type="submit" name="login" class="btn btn-primary btn-block" value="Submit">
                                                            <a href="javascript:openPopup()" style="color: red;">want to create profile? <u>register</u> now</a>
															<!-- <input type="submit" class="btn btn-success btn-block"  onclick="openPopup()" value="new account"> -->
														</div>
													
														
													</div>
													</form>
													<div class="popup" id="popup">
															
														<form method="POST">
															<!-- Add your new account form fields here -->
															<div class="row form-group">
																<h3>Create account</h3>
																<div class="col-md-12">
																	<label for="newUsername">fullname</label>
																	<input type="text" name="name" required class="form-control">
																</div>
															</div>
													
															<div class="row form-group">
																<div class="col-md-12">
																	<label for="newPassword">Email</label>
																	<input type="email" name="email" required class="form-control">
																</div>
															</div>
															<div class="row form-group">
																<div class="col-md-12">
																	<label for="newPassword">Phone</label>
																	<input type="number" name="phone" required class="form-control">
																</div>
															</div>
															<div class="row form-group">
																<div class="col-md-12">
																	<label for="newPassword">Password</label>
																	<input type="password" name="password1" required id="password1" class="form-control" oninput="checkPasswordStrength()">
																	<small id="passwordStrength">
																		Password should contain at least 8 characters, 1 uppercase, 1 lowercase, 1 digit, and 1 special character.
																	</small>
																	<progress id="strengthBar" max="5" value="0"></progress>
																</div>
															</div>
															<div class="row form-group">
																<div class="col-md-12">
																	<label for="confirmPassword">Confirm Password</label>
																	<input type="password" id="confirmPassword" required name="confirmPassword" class="form-control" oninput="checkPassword()">
																	<small id="passwordMessage"></small>
																</div>
															</div>
															<script>
																function checkPasswordStrength() {
																	var password = document.getElementsByName("password1")[0].value;
																	var passwordStrength = document.getElementById("passwordStrength");
																	var strengthBar = document.getElementById("strengthBar");
															
																	// Check for at least 8 characters, 1 uppercase, 1 lowercase, 1 digit, and 1 special character
																	var regexLowerCase = /[a-z]/;
																	var regexUpperCase = /[A-Z]/;
																	var regexDigit = /\d/;
																	var regexSpecialChar = /[@$!%*?&]/;
															
																	var strength = 0;
															
																	if (password.length >= 8) strength++;
																	if (regexLowerCase.test(password)) strength++;
																	if (regexUpperCase.test(password)) strength++;
																	if (regexDigit.test(password)) strength++;
																	if (regexSpecialChar.test(password)) strength++;
															
																	strengthBar.value = strength;
																}
															
															
																function checkPassword() {
																	var password = document.getElementsByName("password1")[0].value;
																	var confirmPassword = document.getElementById("confirmPassword").value;
																	var passwordMessage = document.getElementById("passwordMessage");
															
																	if (password === confirmPassword) {
																		passwordMessage.innerHTML = "Passwords match";
																		passwordMessage.style.color = "green";
																	} else {
																		passwordMessage.innerHTML = "Passwords do not match";
																		passwordMessage.style.color = "red";
																	}
																}
															</script>
															
															
													
															<div class="row form-group">
																<div class="col-md-6">
																	<input type="submit" name="register" class="btn btn-primary btn-block" value="Submit">
																</div>
															</div>
														</form>
   
													<script>
														function openPopup() {
															
															document.getElementById("popup").style.display = "block";
														}
													
														function closePopup() {
															
															document.getElementById("popup").style.display = "none";
														}
													</script>
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
		</header>
	</div>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	
	<!-- Datepicker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	

	<!-- Main -->
	<script src="js/main.js"></script>
	<!-- <script src="ajax/login.js"></script> -->
	<!-- <script src="ajax/register.js"></script> -->

	</body>
</html>


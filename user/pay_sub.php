<?php 
// error_reporting(0);
include('../php/conn.php');
$sub_number=$_SESSION['sub_number'];

	if (empty($_SESSION['sub_number'] || !isset($_SESSION['sub_number'])))
	 {
		echo "<script>history.back();</script>";

	}
global $sub_number_data;
$amount=$_SESSION['sub_amount'];
$type=$_SESSION['sub_type'];
?>
<!DOCTYPE HTML>
<html  lang="en" data-bs-theme="dark">
	<head>


	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
	

	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="../css/themify-icons.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/bootstrap-datepicker.min.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">
    
	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>

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
		
	
	<!-- <div class="page-inner"> -->
	
	<div id="page ">
		<header id="gtco-header" class="gtco-cover gtco-cover-md" role="banner" style="background-image: url(images/rest.jpg)">
		
										
										<div class="tab-content col-md-8 ">
											
							<h3 style="color: rgb(251, 181, 4);"> Nyandundungu <?php echo $type;?> Entrance monthly Suscription
                            Amount: <small style="color: rgb(44, 99, 154);">
							<?php echo $amount;?>     Rwf</small>  </h3>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
												
                                                  
                                                    <!-- Image and Submit Button for PayPal -->
                                                    <div class="row align-items-center mt-1 ">
                                                        <div class="col-sm-1">
                                                            <img class="img-fluid" src="../images/mtn.png " alt="PayPal Logo" style="width: 30px; border-radius: 12px;">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="submit" class="btn btn-success btn-block" onclick="openPopup()" value="MTN payment">
                                                        </div>
                                                    </div>
                                                          <!-- Image and Submit Button for PayPal -->
											
														<div class="row form-group">
                                                        <div class="col-sm-1">
                                                            <img  class="img-fluid" src="../images/paypal.png" alt="MTN Logo" style="width:35px;border-radius: 12px;">
                                                        </div>
                                                        <div class="col-md-8">
								<form action="sub_paypal.php" method="POST">
									<input type="hidden" name="number"  value="<?php echo $sub_number ?> ">
									
									<input type="hidden" name="amount" value="<?php echo $amount ?> ">
								<input type="submit" name="paypal" class="btn btn-primary btn-block" value="Paypal payment" >
                             	</form> 
								  
							                              </div> 
                                                    </div>
														
													</div>
												
													<div class="popup " id="popup">
															
														<form action="sub_request.php" method="POST" class=" ">
															<!-- Add your new account form fields here -->
															<div class="row form-group">
																<h3><small style="color: rgb(44, 99, 154);">
																	Pay <?php echo $amount;?> Rwf with MTN</small> </h3>
																<div class="col-md-12">
																	<label for="newUsername">Enter mtn number to pay with</label>
									                                <input type="hidden" name="sub_number" value="<?php echo $sub_number; ?> ">
																	<input type="hidden" name="amount" value="<?php echo $amount; ?>">
																	<input type="number" name="number" id="paynumber" class="form-control">
																</div>
														
															
															<div class="row form-group">
																<div class="col-sm-4">
																	<input type="submit" name="mtn" class="btn btn-primary btn-block" value="Submit">
																</div>
															</div>
														</form>
														
														
													</div>

													<script>
														function openPopup() {
															
															document.getElementById("popup").style.display = "block";
														}
													
														function closePopup() {
															
															document.getElementById("popup").style.display = "none";
														}
													</script>
										
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
		<script src="../js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="../js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="../js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="../js/jquery.waypoints.min.js"></script>
		<!-- Carousel -->
		<script src="../js/owl.carousel.min.js"></script>
		<!-- countTo -->
		<script src="../js/jquery.countTo.js"></script>
	
		<!-- Stellar Parallax -->
		<script src="../js/jquery.stellar.min.js"></script>
	
		<!-- Magnific Popup -->
		<script src="../js/jquery.magnific-popup.min.js"></script>
		<script src="../js/magnific-popup-options.js"></script>
		
		<!-- Datepicker -->
		<script src="../js/bootstrap-datepicker.min.js"></script>
		
	
		<!-- Main -->
		<script src="../js/main.js"></script>
		<script>
			

		</script>
	</body>
</html>


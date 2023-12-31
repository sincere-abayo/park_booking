<?php
require '../vendor/autoload.php';
require '../php/conn.php';


if( !isset($_GET['ticket']) || empty($_GET['ticket'])){
  echo "
  <script>history.back()</script>
  ";
}
$ticketNumber= $_GET['ticket'];

$size=200;
$url="<a href='https://feasible-weekly-ringtail.ngrok-free.app/user/agent.php?t_number=$ticketNumber'></a>";
$qrCodeUrl = "https://chart.googleapis.com/chart?chs={$size}x{$size}&cht=qr&chl=" . urlencode($url);

// if ($updateTicket && $paTicket) {
    $selectClient = $conn->query("SELECT * from subscription where s_number='$ticketNumber'");

    $client = mysqli_fetch_array($selectClient);

    $name=$client['s_name'];
    $email=$client['s_email'];
    $type=$client['s_type'];
    $amount=$client['s_amount'];
    $country=$client['s_country'];
 $phone=$client['s_phone'];
 $passport=$client['s_passport'];
 $createdAt = $client['created_at'];

 
$created_at = strtotime($client['created_at']);
$currentDate = time();

$secondsInDay = 60 * 60 * 24; // Number of seconds in a day
$interval = ($currentDate - $created_at) / $secondsInDay;

$remainingDay = 30 - floor($interval);
    // HTML content for the email
    $emailContent = "
        <html>
        <body>
            <h1>Nyandungu monthly entrance subscription </h1>
            <p>  Type: $type :--:  $amount rwf </p>
          
            <b> Ticket details
            <p>Name : $name</p>
            <p>Email : $email</p>
            <p>Phone : $phone</p>
            <p>Country : $country</p>
            <p>Id/Passport : $passport</p>
       
            <p>Subscription Number: $ticketNumber</p></b>
            <p>Activated at : ".$createdAt."</p></b>
            <div>
            <img src=\"$qrCodeUrl\" alt=\"QR Code\">
        </div>
        </body>
        </html>
    ";




?>


<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="UTF-8">
<title>Success Page</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>


<style>
/* Add your CSS styles here */
body {
 font-family: Arial, sans-serif;
 background-color: #f4f4f4;
 margin: 0;
 padding: 20px;
}
.container {
 max-width: 600px;
 margin: 0 auto;
 background-color: #fff;
 padding: 20px;
 border-radius: 8px;
 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
.ticket-info {
 margin-bottom: 20px;
}
/* Add more styles as needed */
</style>
</head>
<body>
<div class="container">
<h1>Dear <?php echo $_SESSION['email'] ?></h1>
<div class="ticket-info" id="targetDivision">
 <p>You have been activated  <?php echo $type?> monthly entrance subscription in Nyandungu </p>
 <?php
   echo "<p>Subscription worth $amount rwf for Nyandungu Entrance. Type: $type</p> 
   <b>Ticket detail<b>
   <p>Name : $name</p>
   <p>Email : $email</p>
   <p>Phone : $phone</p>
   <p>Country located in: $country</p>
   <p>Id/Passport : $passport</p>
   <p>Activated at: $createdAt</p>
   <p>Remaining day : $remainingDay</p>

   <div>
   <img src=\"$qrCodeUrl\" alt=\"QR Code\">
</div>
   ";
 ?>
 

</div>
<a href="index.php">Dashboard</a>
</body>
</html>

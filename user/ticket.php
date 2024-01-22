<?php
include '../vendor/autoload.php';
require '../php/conn.php';


$ticketNumber= $_GET['t_number'];
// $amount=$_SESSION['paidAmount'];
$size=200;
$url = "http://localhost/nyandungu/user/agent.php?t_number=$ticketNumber";
// $url="<a href='http://localhost/nyandungu/user/agent.php?t_number=$ticketNumber'>verify ticket</a>";
$qrCodeUrl = "https://chart.googleapis.com/chart?chs={$size}x{$size}&cht=qr&chl=" . urlencode($url);
    $selectClient = $conn->query("SELECT * from ticket where t_number='$ticketNumber'");

    $client = mysqli_fetch_array($selectClient);
    $type = $client['t_nationality'];
    $name=$client['t_name'];
    $phone=$client['t_phone'];
    $date=$client['t_date'];
    $time=$client['t_time'];
    $email=$client['t_email'];
    $created_at=$client['created_at'];
    $country=$client['t_country'];
    $id=$client['t_identity'];
    $amount=5000;
    if ($client['t_nationality'] == 'eastAfrica') {
        $type = 'Rwanda-East Africa';
        $amount=1500;
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="UTF-8">
<title>Success Page</title>
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
<h1>Thank You!</h1>
<div class="ticket-info">
 <p>Thank you for purchasing the Nyandungu Entrance Ticket.</p>
 <?php
   echo "<p>Thank you for buying a ticket worth $amount for Nyandungu Entrance. Type: $type</p> 
   <b>Ticket detail<b>
   <p>Name : $name</p>
   <p>Email : $email</p>
   <p>phone : $phone</p>
   <pCountry located in: $country</p>
   <p>Id/Passport : $id</p>
   </p>Entrance date-time: $date - $time </p>
   <p>Ticket Number: $ticketNumber</p>
   <div>
   <a href='$url' target='_blank'><img src='$qrCodeUrl' alt='QR Code'></a>
</div>
   ";
  //  <img src=\"$qrCodeUrl\" alt=\"QR Code\">
 ?>
<a href="index.php">Dashboard</a>
 
</div>
</div>
</body>
</html>
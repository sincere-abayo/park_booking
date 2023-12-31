<?php
require '../vendor/autoload.php';
require '../php/conn.php';
// require_once '../vendor/phpmailer\phpmailer';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


if( $_SESSION['paidTicket']){
    $ticketNumber= $_SESSION['paidTicket'];
$amount=$_SESSION['paidAmount'];
$method=$_SESSION['method'];
// $type=$_SESSION['sub_type'];
$size=200;
$url="<a href='https://feasible-weekly-ringtail.ngrok-free.app/user/agent.php?t_number=$ticketNumber'></a>";
$qrCodeUrl = "https://chart.googleapis.com/chart?chs={$size}x{$size}&cht=qr&chl=" . urlencode($url);
$updateTicket = $conn->query("UPDATE subscription set s_status=2,created_at=now() where s_number='$ticketNumber'");
$paTicket=$conn->query("INSERT into payment values(null,'$amount',null,'$ticketNumber','$method',now())");
// if ($updateTicket && $paTicket) {
    $selectClient = $conn->query("SELECT * from subscription where s_number='$ticketNumber'");

    $client = mysqli_fetch_array($selectClient);

    $name=$client['s_name'];
    $email=$client['s_email'];
    $type=$client['s_type'];
    $country=$client['s_country'];
 $phone=$client['s_phone'];
 $passport=$client['s_passport'];
 $created_at = strtotime($client['created_at']);
 $createdAt = $client['created_at'];
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

$mail = new PHPMailer(true);

try {
    // SMTP Configuration
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_OFF;  // Set to `SMTP::DEBUG_SERVER` for debugging
   $mail->Host = 'smtp.gmail.com';    // Your SMTP server host
    $mail->SMTPAuth = true;
  $mail->Username = 'infoafonete@gmail.com'; // Your SMTP username
$mail->Password = 'fzrtkipkhurdizgm'; // Your SMTP password
    $mail->SMTPSecure = 'tls';          // Enable TLS encryption; `ssl` also accepted
    $mail->Port = 587;
  
//    // Recipients
   $mail->setFrom('nyandungu@gmail.com', 'Nyandungu Entrance');
   $mail->addAddress($client['s_email']); // Client's email
   $mail->isHTML(true);
   $mail->Subject = 'Nyandungu monthly entrance subscription';
   $mail->Body = $emailContent;
//->send
  if( $mail->send())
  {
  
}

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
<?php
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }
 }
 ?>
<?php
require '../vendor/autoload.php';
require '../php/conn.php';
// require_once '../vendor/phpmailer\phpmailer';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$ticketNumber= $_SESSION['paidTicket'];
$amount=$_SESSION['paidAmount'];
$method=$_SESSION['method'];

$size=200;
$url="<a href='localhost/nyandungu/user/agent.php?t_number=$ticketNumber'>verify ticket</a>";
$qrCodeUrl = "https://chart.googleapis.com/chart?chs={$size}x{$size}&cht=qr&chl=" . urlencode($url);
$updateTicket = $conn->query("UPDATE ticket set t_status=3,created_at=now() where t_number='$ticketNumber'");
$paTicket=$conn->query("INSERT into payment values(null,'$amount','$ticketNumber',null,'$method',now())");
if ($updateTicket && $paTicket) {
    $selectClient = $conn->query("SELECT * from ticket where t_number='$ticketNumber'");

    $client = mysqli_fetch_array($selectClient);
    $type = $client['t_nationality'];
    $name=$client['t_name'];
    $date=$client['t_date'];
    $time=$client['t_time'];
    $email=$client['t_email'];
    
    $country=$client['t_country'];
    $id=$client['t_identity'];
    if ($client['t_nationality'] == 'eastAfrica') {
        $type = 'Rwanda-East Africa';
    }

    // HTML content for the email
    $emailContent = "
        <html>
        <body>
            <h1>Nyandungu Entrance Ticket</h1>
            <p>Dear $name</p>
            <p>Thank you for purchasing the Nyandungu Entrance Ticket.</p>
            <p>Thank you for buying a ticket worth $amount for Nyandungu Entrance. Type: $type</p>
            <b> Ticket details
            <p>Email : $email</p>
            <p>Country located in: $country</p>
            <p>Id/Passport : $id</p>
            </p>Entrance date-time: $date - $time </p>
            <p>Ticket Number: $ticketNumber</p></b>
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
  
   // Recipients
   $mail->setFrom('nyandungu@gmail.com', 'Nyandungu Entrance');
   $mail->addAddress($client['t_email']); // Client's email
   $mail->isHTML(true);
   $mail->Subject = 'Nyandungu Entrance Ticket Purchase Confirmation';
   $mail->Body = $emailContent;

  if( $mail->send())
  {
  
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
   <p>Email : $email</p>
   <p>Country located in: $country</p>
   <p>Id/Passport : $id</p>
   <p>Entrance date-time: $date - $time </p>
   <p>Ticket Number: $ticketNumber</p>
   <div>
   <img src=\"$qrCodeUrl\" alt=\"QR Code\">
</div>
   ";
 ?>
 <a href="index.php">Dashboard</a>
</div>
</div>
</body>
</html>
<?php
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }
 }

 ?>
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
/* Basic reset and general styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
}

/* Styling for the form */
.login-form {
    max-width: 300px;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style for labels */
label {
    display: block;
    margin-bottom: 6px;
    color: #333;
}

/* Style for input fields */
input[type="text"],
input[type="password"] {
    width: calc(100% - 12px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Style for submit button */
button[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Responsive styles */
@media (max-width: 768px) {
    .login-form {
        max-width: 100%;
    }
}

/* Add more styles as needed */
</style>
<?php
include '../vendor/autoload.php';
require '../php/conn.php';
if (!isset($_GET['t_number'])) {
   header("location:../user/");
}
if (isset($_POST['agent'])) {
    $user=$_POST['username'];
    $pass=$_POST['password'];

    $select_agent=$conn->query("SELECT * from agent where a_username='$user' and a_password='$pass' and a_status='approved'");
    if (mysqli_num_rows($select_agent)) {
        $_SESSION['agent']=$user;
    }
    else {
        ?>
     <script>
        alert('Incorrect agent credintials');
     </script>
        <?php
    }
}
if (!isset($_SESSION['agent'])) {
  ?>
<form action="#" method="post" class="login-form">
    <label for="agent" style="text-align: center;">Agent Login</label>
    <input type="text" name="username" placeholder="Enter Username">
    <input type="password" name="password" placeholder="Enter Password">
    <button type="submit" name="agent">Login</button>
</form>


  <?php
}
else{
?>

<?php
$ticketNumber= $_GET['t_number'];
$checkTicket=$conn->query("SELECT * from ticket where t_number='$ticketNumber' and t_status=4");
if (mysqli_num_rows($checkTicket)) {
    $date=mysqli_fetch_array($checkTicket);
    $status="<span style='color:red'> Used on </span>". $date['created_at'];
    echo "<script>
    alert('Ticket already Used, fail');
</script>";
}
else {
$updateTicket = $conn->query("UPDATE ticket set t_status=4,created_at=now() where t_number='$ticketNumber'");
if ($updateTicket) {
    $checkUpdateTicket=$conn->query("SELECT * from ticket where t_number='$ticketNumber'");
    $dateUpdated=mysqli_fetch_array($checkUpdateTicket);
    $status="<span style='color:green'> Verified now on  </span>". $dateUpdated['created_at'];

    echo "<script>
    alert('Ticket verified well');
</script>";
}
}
    $selectClient = $conn->query("SELECT * from ticket where t_number='$ticketNumber'");

    $client = mysqli_fetch_array($selectClient);
    $type = $client['t_nationality'];
    $name=$client['t_name'];
    $date=$client['t_date'];
    $time=$client['t_time'];
    $email=$client['t_email'];
    $amount=5000;
    $country=$client['t_country'];
    $id=$client['t_identity'];
    if ($client['t_nationality'] == 'eastAfrica') {
        $type = 'Rwanda-East Africa';
        $amount=1500;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="UTF-8">
<title>Ticket verification</title>

</head>
<body>
<div class="container">
<h1>Nyandungu Entrance Ticket.</h1>
<div class="ticket-info">
 <p></p>
 <?php
   echo "
    <b>Ticket detail<b>
   <p>Ticket worth $amount</p>
   <p> Type: $type</p> 
  
   <p>Email : $email</p>
   <p>Country located in: $country</p>
   <p>Id/Passport : $id</p>
   </p>Entrance date-time: $date - $time </p>
   <p>Ticket Number: $ticketNumber</p>
    <p id='status'>$status</p>
   ";
}
 ?>

</div>
</div>
</body>
</html>

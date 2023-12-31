<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the data sent via AJAX
  $data = $_POST['data'];
  $data=explode(',',$data);
  $name = $data[0];
  $nationality =   $data[1];
  $country =   $data[2];
  $identity = $data[3];
  $t_email =   $data[4];
  $phone =   $data[5];
  $date =   $data[6];
  $time =   $data[7];
  $booked=0;
  $ticket=rand(00000,99999);
  $_SESSION['ticket']=$ticket;
$email=$_SESSION['email'];
 $select=$conn->query("SELECT * from user where u_email='$email'");
 $row=mysqli_fetch_array($select);
 $user=$row['u_email'];
//  echo "well";
$insert=$conn->query("INSERT into ticket values(null,'$name','$nationality','$country','$identity','$phone','$t_email','$date','$time','$ticket','$booked','$user',now())") or die("failed to book ticket =");
if($insert)  {

echo 'success';
}
}
else
 {
  echo 'Invalid request method.';
}

?>

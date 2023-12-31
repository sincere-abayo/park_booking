<?php
include 'conn.php';

 
    $email=$_SESSION['email'];
  $select=$conn->query("SELECT u_email,t_status from ticket where u_email='$email' and t_status=0") or die("failed to get cart");
 
    http_response_code(200);
$cart=mysqli_num_rows($select);
echo "$cart";
    
// echo "well";


?>

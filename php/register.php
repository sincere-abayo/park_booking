<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the data sent via AJAX
  $data = $_POST['data'];
  $data=explode(',',$data);
  $name = $data[0];
  $email =   $data[1];
  $phone =   $data[2];
  
  $password = $data[3];

  $select=$conn->query("SELECT u_email from user where u_email='$email'");
  if (mysqli_num_rows($select)==1) {
    echo "Email Already used, preceed to login or use other email";
    return;
  }
$insert=$conn->query("INSERT into user values(null,'$name','$phone','$email','$password',now())") or die("failed to save data =");
if($insert)  {
    $_SESSION['email']=$email;
echo 'Account created well, you will be redirected to your account';
}
else
 {
  echo 'Invalid request method.';
}
}
?>

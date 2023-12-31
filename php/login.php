<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the data sent via AJAX
  $data = $_POST['data'];
  $data=explode(',',$data);
  $email =   $data[0]; 
  $password = $data[1];

  $select=$conn->query("SELECT * from user where u_email='$email' and u_password='$password' ");
  if (mysqli_num_rows($select))
   {
    
$_SESSION['email']=$email;
// echo "well";
    
  }
  else{
    http_response_code(401); // Set a 401 Unauthorized status code

    echo "Acount not found try again,  Forget your password? resert in login form";
  }
}
else
 {
  echo 'Invalid request method.';
}

?>

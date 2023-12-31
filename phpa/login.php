<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the data sent via AJAX
  $data = $_POST['data'];
  $data=explode(',',$data);
  $email =   $data[0]; 
  $password = $data[1];

  $select=$conn->query("SELECT * from admin where a_password='$password' and a_email='$email'");
  if (mysqli_num_rows($select))
   {
    
$_SESSION['admin']=$email;
// echo "well";
    
  }
  else{
    http_response_code(401); // Set a 401 Unauthorized status code

    echo "Acount not found try again,  ";
  }
}
else
 {
  echo 'Invalid request method.';
}

?>

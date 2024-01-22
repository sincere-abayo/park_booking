<?php 
session_start();

require_once '../vendor/autoload.php';
include_once '../vendor/ramsey/uuid/src/Uuid.php';
use ramsey\Uuid\Uuid;
if(!isset($_SESSION["payerEmail"]) && !isset($_SESSION["payerName"]))
{
    echo "<script>history.back()</script>";
}
else
{
    $conn=mysqli_connect("localhost","root","","nyandungu") or die("failed to connect");
    $amount= $_SESSION['paidAmount'];
    $email=  $_SESSION['payerEmail'];
    $name= $_SESSION['payername'];
    $method= $_SESSION['method'];
    $uuid= Uuid::uuid4()->toString();

    $insertTransction=$conn->query("INSERT INTO refound values('','$name','$email','$amount','$method','$uuid',now())");
   if($insertTransction)
   {
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Success</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="card-title mb-4">Thank You for Your Donation!</h2>
                        <p class="card-text">We greatly appreciate your support. Your donation will make a difference.</p>
                        <img src="images/thx.webp" class="img-fluid mt-3" alt="Thank You Image">

                        <p class="mt-4">Transaction ID: <strong><?php echo $uuid; ?></strong></p>
                        <p>Amount: <strong><?php echo $amount; ?></strong></p>

                        <a href="index.php" class="btn btn-primary mt-3">Return to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

}
else{  
    echo "failed to record transaction of your donation,";
}

}
    ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8Y+JcFO3LZKBrAYBh3B18PFQFqMnZb2j+fu5O6H/1CllK6v0kOO5G+8iIfvA" crossorigin="anonymous"></script>
</body>

</html>

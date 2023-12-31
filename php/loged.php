<?php
if (isset($_SESSION['email']) || !empty($_SESSION['email'])) {
header("location:user/index.php");
    
} 

?>
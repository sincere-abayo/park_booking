<?php
session_start();
if (isset($_SESSION['email']) || empty($_SESSION['email'])) {
    // Session exists
 header("location:../login.html");
}
 
?>
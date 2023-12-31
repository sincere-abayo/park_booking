<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title=$_POST['title'];
    $desc=$_POST['description'];
    $file=$_FILES['image'];
    $filename=$file['name'];
    $filedata=$file['tmp_name'];
    $path="../uploads/";
    $uploadFilename=rand(00000,99999) . $filename;
    $uploadFile=$path . $uploadFilename;
    $extension=['jpeg','jpg','gif','png'];

    $fileExtension=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    if (in_array($fileExtension,$extension)) {
    //    echo "$fileExtension good";
  if (move_uploaded_file($filedata,$uploadFile)) {
    $insert=$conn->query("INSERT into destination values('','$uploadFilename','$title','$desc',now())");
    if ($insert) {
    echo "Destination uploaded well";
        
    }
    else {
        echo "failed to upload";
    }
  }

    }

    else{
       $_SESSION['extension']="bad image file, allwoed('jpeg','jpg','gif','png')";
    }

  
}




?>
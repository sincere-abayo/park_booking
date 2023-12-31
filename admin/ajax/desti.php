<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "jjjj";
//   if (isset($_FILES['file'])) {
//     $file = $_FILES['file'];

//     $uploadDir = '../uploads/';
//     $uploadFile = $uploadDir . basename($file['name']);

//     if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
//       echo 'File is valid, and was successfully uploaded.';
//     } else {
//       echo 'File upload failed.';
//     }
//   } else {
//     echo 'No file received.';
//   }
} else {
  echo 'Invalid request method.';
}
?>

<?php
session_start();
if (isset($_SESSION['admin'])) {
    // Session exists
   http_response_code(200);

    echo "Session is active";
    
} 
else {
    // Session does not exist
    http_response_code(401); // Set a 401 Unauthorized status code
    echo "No active session";
}
?>
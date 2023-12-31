<?php
include 'conn.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'id' parameter exists in the POST request
    if (isset($_POST['id'])) {
        // Retrieve the 'id' parameter value
        $id = $_POST['id'];

$delete=$conn->query("DELETE from destination where d_id='$id'");
if ($delete) {
    echo "Destination deleted well";
}

else  {
    echo "Failed to delete destination";
}
    } 
    else {
        // If 'id' parameter is not set in the POST request
        http_response_code(400); // Bad Request
        echo "ID parameter is missing";
    }
} else {
    // If the request method is not POST
    http_response_code(405); // Method Not Allowed
    echo "Only POST method is allowed";
}
?>
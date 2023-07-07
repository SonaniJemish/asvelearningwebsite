<?php 
$conn = mysqli_connect('localhost', 'root', '', 'asv');

if ($conn) {
    // Connection successful
} else {
    echo 'Error occurred while connecting to the database: ' . mysqli_connect_error();
}

// session_start();
?>

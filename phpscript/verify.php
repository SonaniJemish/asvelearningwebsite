<?php
require '../phpscript/config.php';

if (isset($_GET['token'])) {
    $verification_token = $_GET['token'];

    // Query the database to check if the token exists
    $query = "SELECT id FROM subscriber WHERE tokenlist = '$verification_token' AND confirmation = 0";
    $result = mysqli_query($conn, $query);

    if ($result === false) {
        echo "Query failed: " . mysqli_error($conn);
    } elseif (mysqli_num_rows($result) == 1) {
        // Token is valid, mark the user as verified
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];

        // Update the 'confirmation' field to indicate user verification
        $update_query = "UPDATE subscriber SET confirmation = 1 WHERE id = $user_id";
        if (mysqli_query($conn, $update_query)) {
            echo "Email verification successful!";
        } else {
            echo "Error updating user confirmation status: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid verification token or user is already verified.";
    }
} else {
    echo "Verification token not provided in the URL.";
}
?>
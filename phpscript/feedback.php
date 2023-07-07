<?php
include '../phpscript/config.php';

$fname = $_POST['fname'] ?? '';
$femail = $_POST['femail'] ?? '';
$fphone = $_POST['fphone'] ?? '';
$ftextarea = $_POST['ftextarea'] ?? '';

if (isset($_POST['submitfeedback'])) {
    // Validate form data
    if (empty($fname) || empty($femail) || empty($fphone) || empty($ftextarea)) {
        $error_message = "Please fill in all the fields.";
    } else {
        $qr = "INSERT INTO `feedback`(`name`, `email`, `phone`, `feedback`) VALUES ('$fname', '$femail', '$fphone', '$ftextarea')";
        $res = mysqli_query($conn, $qr);

        if ($res) {
            header('Location: ../index.php');
            exit;
        } else {
            $error_message = "Error updating Feedback: " . mysqli_error($conn);
        }
    }
}
?>

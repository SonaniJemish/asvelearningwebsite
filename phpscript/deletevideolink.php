<?php
include 'config.php';

// Delete video link
if (isset($_GET['vdelid'])) {
  $id = $_GET['vdelid'];

  $query = "DELETE FROM `videolink` WHERE id = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);

  if (mysqli_stmt_affected_rows($stmt) > 0) {
    header("Location: ../Admin/viewvideolink.php?success");
    exit();
  } else {
    $error = "Failed to delete video link: " . mysqli_error($conn);
  }

  mysqli_stmt_close($stmt);
}

$data = mysqli_query($conn, "SELECT * FROM courses");
$data1 = mysqli_query($conn, "SELECT * FROM videolink");

if (!$data || !$data1) {
  $error = "Error: " . mysqli_error($conn);
}

?>

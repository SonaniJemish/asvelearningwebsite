<?php
include 'config.php';

// Delete category
if (isset($_GET['delid'])) {
  $id = $_GET['delid'];

  $query = "DELETE FROM `courses` WHERE coursename = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);

  if (mysqli_stmt_affected_rows($stmt) > 0) {
    header("Location: ../Admin/viewcategory.php?success");
    exit();
  } else {
    $error = "Failed to delete category: " . mysqli_error($conn);
  }

  mysqli_stmt_close($stmt);
}

?>

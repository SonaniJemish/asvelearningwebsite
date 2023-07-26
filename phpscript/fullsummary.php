<?php
include 'config.php';

$cname = $_GET['fullsummary'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addlongsummary'])) {
    $longsummary = $_POST['ckeditor'];

    // Use prepared statements to prevent SQL injection
    $query = "UPDATE `summary` SET `discription`=? WHERE coursename=?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $longsummary, $cname);
        $res = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($res) {
            header('Location: ../admin/discription.php');
            exit;
        } else {
            $error_message = "Error updating category: " . mysqli_error($conn);
            // You might want to handle the error in a better way, e.g., log the error.
            echo $error_message; // Print the error message for debugging purposes
        }
    } else {
        // Handle the error when preparing the statement.
        die("Database error. Please try again later.");
    }
}

// Use prepared statements to prevent SQL injection
$select_query = "SELECT * FROM summary WHERE coursename=?";
$stmt = mysqli_prepare($conn, $select_query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $cname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
    mysqli_stmt_close($stmt);
} else {
    // Handle the error when preparing the statement.
    die("Database error. Please try again later.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>WebUni - Education Template</title>
    <meta charset="UTF-8">
    <meta name="description" content="WebUni Education Template">
    <meta name="keywords" content="webuni, education, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="../img/favicon.ico" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/owl.carousel.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="css/style.css" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="fullsummary.php">Full Description</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../Admin/description.php">Description</a>
                </li>
            </ul>
        </div>
    </nav>
    <section class="summary">
    <script src="../Admin/ckeditor4/ckeditor/ckeditor.js"></script>

        <form action="fullsummary.php?fullsummary=<?= $cname ?>" method="post" class="m-5">
            <textarea name="ckeditor" id="ckeditor" cols="30" rows="20"><?= $row['discription'] ?? '' ?></textarea>
            <input type="submit" name="addlongsummary" class="form-control mt-3 btn-success" value="Save">
        </form>
        <script>
            CKEDITOR.replace('ckeditor', {
                height: 400
            });
        </script>
    </section>

    <!--====== Javascripts & Jquery ======-->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script> -->
    <!-- <script src="../Admin/ckeditor4/ckeditor.js"></script> -->

    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/circle-progress.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>

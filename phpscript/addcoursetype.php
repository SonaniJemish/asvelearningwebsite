<?php
include '../phpscript/config.php';
error_reporting(0);

$ncoursetype = $_POST['ncoursetype'];
$ncourseimage = $_POST['ncourseimage'];


if (isset($_POST['addtype'])) {
    $qr = "INSERT INTO `coursetype`(`coursetype`,`image`) VALUES ('$ncoursetype','$ncourseimage')";
    $res = mysqli_query($conn, $qr);
    if ($res) {
        move_uploaded_file($_FILES['ncourseimage']['tmp_name'], "../img/courses/" . $_FILES['ncourseimage']['name']);
        header('location: ../Admin/viewcoursetype.php');
        exit;
    } else {
        $error_message = "Error updating category: " . mysqli_error($conn);
        echo $error_message; // Print the error message for debugging purposes
    }
}
if (isset($_POST['backtopage'])) {
    header('location:../admin/category.php');
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

    <section class="mt-5 pt-5 ml-5 pl-5">
        <form action="addcoursetype.php" method="post">
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">New Course Type :</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="colFormLabel" name="ncoursetype">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">New Course Image :</label>
                <div class="col-sm-4">
                    <input type="file" class="form-control" id="colFormLabel" name="ncourseimage">
                </div>
            </div>
            <div class="form-group row mt-5 pt-5 ">
                <button type="submit" name="backtopage" class="btn btn-lg mr-4">Previous Page</button>
                <button type="submit" name="addtype" class="btn btn-l">Add Course Type</button>
            </div>
        </form>
    </section>

    <!--====== Javascripts & Jquery ======-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/mixitup.min.js"></script>
    <script src="../js/circle-progress.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>
<?php
include '../phpscript/config.php';
error_reporting(0);

$uid = $_GET['updatetype'];
$select_query = "SELECT * FROM coursetype WHERE id='$uid'";
$data = mysqli_query($conn, $select_query);
$row = mysqli_fetch_array($data);
$ocourseimage = $row['image'];
$ocoursetype = $row['coursetype'];

if (isset($_POST['updatecoursetype'])) {
    $ncourseimage = $_FILES['ncourseimage']['name'];
    $ncoursetype = $_POST['ncoursetype'];

    $qr = "UPDATE `coursetype` SET `coursetype`='$ncoursetype' WHERE `coursetype`='$uid'";
    $res = mysqli_query($conn, $qr);
    if ($res) {
        move_uploaded_file($_FILES['ncourseimage']['tmp_name'], "../img/courses/".$ncourseimage);
        header('location:../admin/viewcoursetype.php');
        exit;
    } else {
        $error_message = "Error updating category: " . mysqli_error($conn);
        echo $error_message; // Print the error message for debugging purposes
    }
}

if (isset($_POST['backtopage'])) {
    header('location:../admin/updatecoursetype.php');
    exit;
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

    <section class="m-5 p-5">
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Old Course Image :</label>
            <div class="col-sm-4">
                <img src="../img/courses/<?php echo $ocourseimage; ?>" alt="image" width="100" height="50">
            </div>
        </div>
        <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Old Course Type :</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="colFormLabel" value="<?php echo $ocoursetype; ?>" disabled>
            </div>
        </div>
    </section>

    <section class="m-5 p-5">
        <form action="updatecoursetype.php?updatetype=<?php echo $uid; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">New Course Image :</label>
                <div class="col-sm-4">
                    <input type="file" class="form-control" id="colFormLabel" name="ncourseimage">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">New Course Type :</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="colFormLabel" name="ncoursetype">
                </div>
            </div>
            <div class="form-group row m-5 p-5">
                <button type="submit" name="backtopage" class="btn btn-lg mr-3">Previous Page</button>
                <button type="submit" name="updatecoursetype" class="btn btn-lg">Update</button>
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

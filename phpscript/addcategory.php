<?php
include '../phpscript/config.php';
$coursename = $_GET['addcat'] ?? '';

$select_query = "SELECT * FROM coursetype WHERE coursetype = '$coursename'";
$data = mysqli_query($conn, $select_query);
$row = mysqli_fetch_array($data);

if (isset($_POST['addcategory'])) {
    $ncoursetype = $_POST['ncoursetype'] ?? '';
    $ncoursename = $_POST['coursecategory'] ?? '';

    // Validate form data
    if (empty($ncoursetype) || empty($ncoursename)) {
        $error_message = "Please fill in all the fields.";
    } else {
        $qr = "INSERT INTO `courses`(`coursetype`, `coursename`) VALUES ('$ncoursetype','$ncoursename')";
        $qr1 = "INSERT INTO `summary`(`coursetype`, `coursename`) VALUES ('$ncoursetype','$ncoursename')";
        $res = mysqli_query($conn, $qr);
        mysqli_query($conn, $qr1);

        if ($res||$res1) {
            header("Location: ../admin/viewcategory.php?viewcategory=$ncoursetype");
            exit;
        } else {
            $error_message = "Error updating category: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['backtopage'])) {
    header('Location: ../admin/viewcoursetype.php');
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
        <form action="addcategory.php" method="post">
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Course Type :</label>
                <div class="col-sm-4">
                    <input type="hidden" class="form-control" id="colFormLabel" name="ncoursetype" value="<?php echo $row['coursetype'] ?? '' ?>">
                    <input type="text" class="form-control" id="colFormLabel" name="ncoursetype" value="<?php echo $row['coursetype'] ?? '' ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Enter Course Category Name :</label>
                <div class="col-sm-4">
                    <input type="link" class="form-control" id="colFormLabel" name="coursecategory">
                </div>
            </div>
            <div class="form-group row m-5 p-5">
                <button type="submit" name="backtopage" class="btn btn-lg mr-3">Previous Page</button>
                <button type="submit" name="addcategory" class="btn btn-lg">Add Course Category</button>
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
<?php
include 'config.php';

$coursename = $_GET['addvideo'] ?? '';

$select_query = "SELECT * FROM courses WHERE coursename = '$coursename'";
$data = mysqli_query($conn, $select_query);
$row = mysqli_fetch_array($data);

if (isset($_POST['addvideolink'])) {
    $ncoursetype = $_POST['ncoursetype'] ?? '';
    $ncoursename = $_POST['ncoursename'] ?? '';
    $videolink = $_POST['videolink'] ?? '';
    $videotitle = $_POST['videotitle'] ?? '';

    // Validate form data
    if (empty($ncoursetype) || empty($ncoursename) || empty($videolink) || empty($videotitle)) {
        $error_message = "Please fill in all the fields.";
    } else {
        $qr = "INSERT INTO `videolink`(`coursetype`, `coursename`, `videolinks`, `videotitle`) VALUES ('$ncoursetype','$ncoursename','$videolink','$videotitle')";
        $res = mysqli_query($conn, $qr);

        if ($res) {
            header('Location: ../admin/videolink.php');
            exit;
        } else {
            $error_message = "Error updating category: " . mysqli_error($conn);
        }
    }
}

if (isset($_POST['backtopage'])) {
    header('Location: ../admin/videolink.php');
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
        <form action="addvideolink.php" method="post">
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Course Type:</label>
                <div class="col-sm-4">
                    <input type="hidden" class="form-control" id="colFormLabel" name="ncoursetype" value="<?php echo $row['coursetype'] ?? '' ?>">
                    <input type="text" class="form-control" id="colFormLabel" name="ncoursetype" value="<?php echo $row['coursetype'] ?? '' ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Course Name:</label>
                <div class="col-sm-4">
                    <input type="hidden" class="form-control" id="colFormLabel" name="ncoursename" value="<?php echo $row['coursename'] ?? '' ?>">
                    <input type="text" class="form-control" id="colFormLabel" name="ncoursename" value="<?php echo $row['coursename'] ?? '' ?>" disabled>
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Enter Video Link:</label>
                <div class="col-sm-4">
                    <input type="link" class="form-control" id="colFormLabel" name="videolink">
                </div>
            </div>
            <div class="form-group row">
                <label for="colFormLabel" class="col-sm-2 col-form-label">Enter Video Title:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="colFormLabel" name="videotitle">
                </div>
            </div>
            <div class="form-group row m-5 p-5">
                <button type="submit" name="backtopage" class="btn btn-lg mr-3">Previous Page</button>
                <button type="submit" name="addvideolink" class="btn btn-lg">Add Video Link</button>
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

<?php
include "../phpscript/config.php";

$select_query = "SELECT * FROM courses";
$data = mysqli_query($conn, $select_query);

if (!$data) {
    $error = "Error: " . mysqli_error($conn);
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
        <a class="navbar-brand" href="index.php">ASV Learning</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="viewcoursetype.php">View Course Type</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../phpscript/addcoursetype.php">Add Course Type</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="discription.php">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="videolink.php">Video Links</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark  my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <section>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Type</th>
                    <th>Course Name</th>
                    <th>Add Video Link</th>
                    <th>View Video Link</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($error)) {
                    echo '<tr><td colspan="5">' . $error . '</td></tr>';
                } else {
                    while ($row = mysqli_fetch_array($data)) {
                ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['coursetype'] ?></td>
                            <td><?php echo $row['coursename'] ?></td>
                            <td><a href="../phpscript/addvideolink.php?addvideo=<?= $row['coursename'] ?>" type="button" class="btn btn-lg btn-block">Add Video Link</a></td>
                            <td><a href="viewvideolink.php?viewvideo=<?= $row['coursename'] ?>" type="button" class="btn btn-lg btn-block">View Video Link</a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
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
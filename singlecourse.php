<?php
include "./phpscript/config.php";

$cname = $_GET['singlecoursedata'];

$select_query = "SELECT * FROM summary WHERE coursename='$cname'";
$data = mysqli_query($conn, $select_query);
while ($row = mysqli_fetch_array($data)) {
    $longsummary = $row['discription'];
    $coursename = $row['coursename'];
    $coursetype = $row['coursetype'];
}

$selectvideo = "SELECT * FROM videolink WHERE coursename='$cname'";
$data1 = mysqli_query($conn, $selectvideo);
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
    <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/videocss.css" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .nav-item .nav-link {
            color: black;
            font-weight:400;
            font-size:x-large;
        }
        .nav-item .nav-link.active {
            color: #ff0000; 
        }
        
        .nav-item .nav-link.active::after {
            content: "";
            display: block;
            height: 3px;
            background-color: #ff0000;
        }
    </style>



</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="site-logo">
                        <img src="img/logo.png" alt="">
                    </div>
                    <div class="nav-switch">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <nav class="main-menu text-right">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="courses.php">Courses</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li><a href="aboutus.php">About us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header section end -->

    <!-- Page info -->
    <div class="page-info-section set-bg" data-setbg="img/page-bg/2.jpg">
        <div class="container">
            <div class="site-breadcrumb">
                <a href="index.php">Home</a>
                <span>Courses</span>
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <!-- single course title section -->
    <section class="single-course my-5">
        <div class="container">
            <div class="course-meta-area">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <h3><?php echo $coursename ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- single course section end -->

    <!-- single course type start -->
    <section class="course-section my-5">
        <div class="container">
        <ul class="nav nav justify-content-center mb-4" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="summary-tab" data-toggle="pill" href="#summary" role="tab" aria-controls="summary" aria-selected="true">Summary</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="videos-tab" data-toggle="pill" href="#videos" role="tab" aria-controls="videos" aria-selected="false">Videos</a>
        </li>
    </ul>



            <div class="tab-content">
                <div class="tab-pane fade show active" id="summary">
                    <div class="course-item">
                        <div>
                            <?php echo $longsummary ?>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="videos">
                    <div class="row">
                        <?php while ($row1 = mysqli_fetch_array($data1)) { ?>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="course-item">
                                    <?php
                                    $videolink = $row1['videolinks'];
                                    $videotitle = $row1['videotitle'];
                                    $finalvideolink = str_replace('watch?v=', 'embed/', $videolink);
                                    ?>
                                    <iframe src="<?php echo $finalvideolink; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen class="ci-thumb set-bg" width="100%"></iframe>

                                    <div class="course-info">
                                        <div class="course-text">
                                            <h5><?php echo $coursename; ?></h5>
                                            <div class="students"><?php echo $videotitle; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- single course type end -->

    <!-- footer section -->
    <footer class="footer-section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <h4>Contact Info</h4>
                        <ul class="list-unstyled contact-list">
                            <li>1481 Creekside Lane<br>Avila Beach, CA 931</li>
                            <li>+53 345 7953 32453</li>
                            <li>yourmail@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <h4>Quick Links</h4>
                        <ul class="list-unstyled footer-links">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="courses.php">Courses</a></li>
                            <li><a href="aboutus.php">About</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom bg-dark py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center text-light">
                            <p class="mb-0">
                                &copy; <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-light">Colorlib</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer section end -->


    <!--====== Javascripts & Jquery ======-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/circle-progress.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
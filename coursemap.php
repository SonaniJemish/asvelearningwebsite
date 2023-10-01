<?php
include "./phpscript/config.php";


if (isset($_GET['coursedata'])) {
	$cname = $_GET['coursedata'];
	if (isset($_POST['search'])) {
		$searchQuery = $_POST['searchQuery'];
		$select_query = "SELECT * FROM courses WHERE coursename LIKE '%$searchQuery%' AND coursetype='$cname'";
	} else {
		$select_query = "SELECT * FROM courses WHERE coursetype='$cname'";
	}
} else {
	if (isset($_POST['search'])) {
		$searchQuery = $_POST['searchQuery'];
		$select_query = "SELECT * FROM courses WHERE coursename LIKE '%$searchQuery%'";
	} else {
		$select_query = "SELECT * FROM courses";
	}
}



$data1 = mysqli_query($conn, $select_query);
$data = mysqli_query($conn, $select_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>ASV Elearning</title>
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


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
		.custom-white {
			background-color: white;
			color: black;
			/* Optionally change the text color */
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
						<img src="img/logo.png" alt="" height="100" width="100">
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
	<div class="page-info-section set-bg" data-setbg="img/page-bg/1.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a>
				<span>Courses</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- search section -->
	<section class="search-section ss-other-page">
		<div class="container">
			<div class="search-warp">
				<div class="section-title text-white">
					<h2><span>Search your course</span></h2>
				</div>
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<form class="course-search-form" method="POST" action="">
							<div class="input-group">
								<input type="text" name="searchQuery" class="form-control" placeholder="Course">
								<div class="input-group-append">
									<button type="submit" name="search" class="site-btn custom-white">Search Course</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- search section end -->

	<!-- course section -->
	
	<section class="course-section mb-5 mt-5">
		<div class="course-warp">
			<div class="row course-items-area">
				<!-- course -->
				<?php while ($row = mysqli_fetch_assoc($data1)) {?>
					<div class="mix col-lg-3 col-md-4 col-sm-6 <?php echo $row['coursename'] ?>">
						<a href="singlecourse.php?singlecoursedata=<?= $row['coursename'] ?>">
							<div class="course-item">
								<div class="course-info">
									<div class="course-text">
										<h5><?php echo $row['coursetype'] ?></h5>
										<div class="students"><?php echo $row['coursename']; ?></div>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<!-- course section end -->


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
	<script src="js/mixitup.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
<?php
include "./phpscript/config.php";

if (isset($_POST['search'])) {
	$searchQuery = $_POST['searchQuery'];

	$forcategory = "SELECT * FROM courses WHERE coursetype LIKE '%$searchQuery%' OR coursename LIKE '%$searchQuery%'";
	$fortype = "SELECT * FROM coursetype WHERE coursetype LIKE '%$searchQuery%'";
} else {
	$forcategory = "SELECT * FROM courses";
	$fortype = "SELECT * FROM coursetype";
}

$data = mysqli_query($conn, $forcategory);
$data1 = mysqli_query($conn, $fortype);
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
	<link rel="stylesheet" href="css/asv.css" />


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

	<!-- Header section -->
	<header class="header-section pt-4" id="nav">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 pl-0">
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

	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="container">
			<div class="hero-text text-white">
				<h2>Get The Best Free Online Courses</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla <br> dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Course type section start -->

	<section class="course-section spad">
		<div class="container">
			<div class="section-title mb-0">
				<h2>Courses Type</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
		</div>
		<div class="course-warp mt-5">
			<div class="row course-items-area">
				<?php
				$count = 0; 
				while ($row1 = mysqli_fetch_array($data1)) {
					if ($count < 8) {
						$imagePath = './img/courses/' . $row1['image'];
				?>
						<div class="mix col-lg-3 col-md-4 col-sm-6 <?php echo $row1['coursetype'] ?>"><a href="coursemap.php?coursedata=<?= $row1['coursetype'] ?>">
							<div class="course-item">
								<div><img src="<?php echo './img/courses/' . $row1['image']; ?>" alt="image" class="ci-thumb set-bg" width="100%">
								</div>
								<div class="course-info">
									<div class="course-text">
										<h5><?php echo $row1['coursetype'] ?></h5>
									</div>
								</div>
							</div>
						</a></div>
				<?php
						$count++;
					}
				}

				?>


			</div>
		</div>
		<div class="text-center mt-5">
			<a href="coursemap.php" class="btn btn-lg bg-light rounded-pill">Show More</a>
		</div>
	</section>

	<!-- Course type section end -->


	<!-- search section -->


	<section class="search-section mt-5">
		<div class="container">
			<div class="search-warp">
				<div class="section-title text-white">
					<h2>Search your course</h2>
				</div>
				<div class="row">
					<div class="col-md-10 offset-md-1">
						<form class="course-search-form" method="POST" action="">
							<div class="input-group">
								<input type="text" name="searchQuery" class="form-control" placeholder="Course">
								<div class="input-group-append">
									<button type="submit" name="search" class="site-btn">Search Course</button>
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
	<section class="course-section spad">
		<div class="container">
			<div class="section-title mb-0">
				<h2>Featured Courses</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
			</div>
		</div>
		<div class="course-warp mt-5">
			<div class="row course-items-area">
				<?php
				$count = 0; 
				while ($row = mysqli_fetch_array($data)) {
					if ($count < 8) {

				?>
					<div class="mix col-lg-3 col-md-4 col-sm-6">
						<a href="singlecourse.php?singlecoursedata=<?= $row['coursename'] ?>">
							<div class="course-item">
								<div class="course-info">
									<div class="course-text">
										<h5><?= $row['coursetype'] ?></h5>
										<div class="students"><?= $row['coursename'] ?></div>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php
					$count++;
				}
				}

				?>
			</div>
		</div>
	</section>
	<!-- course section end -->

	<!-- signup section -->
	<section class="signup-section spad mb-5">
		<div class="signup-bg set-bg" data-setbg="img/signup-bg.jpg"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="signup-warp">
						<div class="section-title text-white text-left">
							<h2>Contact Us</h2>
						</div>
						<!-- signup form -->
						<form class="signup-form" method="post" action="./phpscript/feedback.php">
							<input name="fname" type="text" placeholder="Your Name">
							<input name="femail" type="text" placeholder="Your E-mail">
							<input name="fphone" type="text" placeholder="Your Phone">
							<textarea name="ftextarea" placeholder="Enter your feedback"></textarea>
							<button name="submitfeedback" class="site-btn">Submit Feedback</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- signup section end -->

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
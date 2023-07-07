<!DOCTYPE html>
<html lang="en">
<head>
	<title>WebUni - Education Template</title>
	<meta charset="UTF-8">
	<meta name="description" content="WebUni Education Template">
	<meta name="keywords" content="webuni, education, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


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
	<header class="header-section pt-4">
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
	<div class="page-info-section set-bg" data-setbg="img/page-bg/4.jpg">
		<div class="container">
			<div class="site-breadcrumb">
				<a href="index.php">Home</a>
				<span>Contact</span>
			</div>
		</div>
	</div>
	<!-- Page info end -->

	<!-- Page -->
	<section class="signup-section my-5">
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
	<!-- Page end -->


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


	<!-- load for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWTIlluowDL-X4HbYQt3aDw_oi2JP0Krc&sensor=false"></script>
	<script src="js/map.js"></script>
</body>
</html>
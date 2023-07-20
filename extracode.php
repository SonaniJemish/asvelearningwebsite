<!-- Filter Section Start -->

	<section class="course-section mb-5">
		<div class="course-warp">
			<ul class="course-filter controls">
				<li class="control active" data-filter="all">All</li>
				<?php
				$count = 0;
				while ($row1 = mysqli_fetch_array($data1)) {	
					if ($count < 8) {
				?>

						<li class="control" data-filter=".<?php echo $row1['coursename'] ?>"><?php echo $row1['coursename'] ?></li>
				<?php
						$count++;
					}
				} ?>

			</ul>
		</div>
	</section>

	<!-- Filter Section End -->


	<!-- course section -->
	<section class="course-section mb-5">
    <div class="course-warp">
        <div class="row course-items-area">
            <!-- course -->
            <?php
            while ($row = mysqli_fetch_array($data)) {
            ?>
                <div class="mix col-lg-3 col-md-4 col-sm-6 <?php echo $row['coursename']; ?>">
                    <a href="singlecourse.php?singlecoursedata=<?php echo $row['coursename']; ?>">
                        <div class="course-item">
                            <div class="course-info">
                                <div class="course-text">
                                    <h5><?php echo $row['coursetype']; ?></h5>
                                    <div class="students"><?php echo $row['coursename']; ?></div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
	<!-- course section end -->




























    
$cname = isset($_GET['coursedata']) ? $_GET['coursedata'] : '';

if (isset($_POST['search'])) {
	$searchQuery = $_POST['searchQuery'];
	$select_query = "SELECT * FROM courses WHERE coursename LIKE '%$searchQuery%' OR coursetype='$cname'";
} else {
	$select_query = "SELECT * FROM courses WHERE coursetype='$cname'";
}
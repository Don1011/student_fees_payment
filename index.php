<?php 
	include("./inc/header.php");
	include("./inc/conn.php")
	
?>
	<!--================ Start Home Banner Area =================-->
	<section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="banner_content">
							<h2>
								Fees payment made easy
							</h2>
							<p>
								We dont just care about our students, but about their guardians as well. Now, you don't have to go through the stress of going to the bank or comming to our school to pay your ward's school fees. You can just pay it from the comfort of your home.
							</p>
							<!-- <div class="search_course_wrap">
								<form action="" class="form_box d-flex justify-content-between w-100">
									<input type="text" class="form-control" name="username" placeholder = "Search Ward">
									<button type="submit" class="btn search_course_btn">Search</button>
								</form>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->



	<!--================ Start Popular Courses Area =================-->
	<div class="popular_courses lite_bg">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="main_title">
						<h2>Pay Fees</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
					$sql_fee_types = "SELECT * FROM fee_type";
					$query_fee_types = mysqli_query($conn, $sql_fee_types);
					while($fetch_fee_types = mysqli_fetch_assoc($query_fee_types)):
				?>
				<!-- single course -->
				<div class="col-lg-12 col-md-12 text-center">
					<div class="single_course">
						<div class="course_content fee_box">
							<h4>
								<a href="select_student.php?fee_id=<?php echo $fetch_fee_types['id']?>"><?php echo $fetch_fee_types['title']?></a>
							</h4>
							<p>
								<b>Amount: </b><?php echo $fetch_fee_types['amount']?><br>
								<b>Start Date: </b><?php echo $fetch_fee_types['start_date']?><br>
								<b>Deadline: </b><?php echo $fetch_fee_types['deadline_date']?><br>
							</p>
							
						</div>
					</div>
				</div>
				<?php
					endwhile;
				?>
			</div>
		</div>
	</div>
	<!--================ End Popular Courses Area =================-->


<?php include("./inc/footer.php")?>
<?php 
	include("./inc/header.php");
	include("./inc/conn.php");	
	$fee_id = $_GET['fee_id'];
?>
    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="banner_content">
							<h2>
								<?php 
									$sql_fee_type = "SELECT * FROM fee_type WHERE id = '".$fee_id."'";
									$query_fee_type = mysqli_query($conn, $sql_fee_type);
									$fetch_fee_type = mysqli_fetch_assoc($query_fee_type);
								?>
								Search the student <br> whose <?php echo $fetch_fee_type['title']?> you <br> would like to pay
							</h2>
							<div class="search_course_wrap">
								<form action="select_student.php" method = "GET" class="form_box d-flex justify-content-between w-100">
									<input type="text" placeholder="Search Student's name or email" class="form-control" name = "query">
									<button type="submit" class="btn search_course_btn"><i class= "lnr lnr-magnifier"></i></button>
								</form>
								<?php
									if(isset($_GET['query'])){
										echo "<a href = '#students' ><button style = 'margin-top: 10px' class = 'btn btn-light'>View Search Results</button></a> 
										<br>
										<a href = 'index.php' ><button style = 'margin-top: 10px' class = 'btn btn-light'>See All Students</button></a>";
									}
								?>
							</div>
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
			<div class="row">
			<?php
				if(isset($_GET['query'])):
					$sql_search_student = "SELECT * FROM all_students WHERE student_fullname LIKE '%".$_GET['query']."%' OR student_email LIKE '%".$_GET['query']."%'";
					$query_search_students = mysqli_query($conn, $sql_search_student);
					if(mysqli_num_rows($query_search_students)):
						while($fetch_search_students = mysqli_fetch_assoc($query_search_students)):
				?>

				<!-- single student for search -->
				<div class="col-lg-2 col-md-4">
					<div class="single_course">
						<div class="course_head overlay">
							<img class="img-fluid w-100" src="<?php echo $fetch_search_students['passport']?>" alt="">
						</div>
						<div class="course_content">
							<h4>
								<a href="pay.php?student_id=<?php echo $fetch_search_students['id']?>&fee_id=<?php echo $fee_id?>"><?php echo $fetch_search_students['student_fullname']?></a>
							</h4>
							<p>
                                <b>email:</b> <?php echo $fetch_search_students['student_email']?> <br>
                                <b>guardian:</b> <?php echo $fetch_search_students['student_guardian']?>
                            </p>
							
						</div>
					</div>
                </div>

				<?php
						endwhile;
					else:
						echo "<div class = 'text-center'><a href = 'index.php' ><button style = 'margin-top: 10px' class = 'btn btn-dark'>
							No Student Matches the search. Click to view all students.
						</button></a></div>";
					endif;
				else:
					$sql_get_students = "SELECT * FROM all_students ORDER BY id DESC";
					$query_get_students = mysqli_query($conn, $sql_get_students);
					while($fetch_get_students = mysqli_fetch_assoc($query_get_students)):
				?>
				<!-- single student for normal display of complete list of students-->
				<div class="col-lg-2 col-md-4">
					<div class="single_course">
						<div class="course_head overlay">
							<img class="img-fluid w-100" src="<?php echo $fetch_get_students['passport']?>" alt="">
						</div>
						<div class="course_content">
							<h4>
								<a href="pay.php?student_id=<?php echo $fetch_get_students['id']?>&fee_id=<?php echo $fee_id?>"><?php echo $fetch_get_students['student_fullname']?></a>
							</h4>
							<p>
                                <b>email:</b> <?php echo $fetch_get_students['student_email']?> <br>
                                <b>guardian:</b> <?php echo $fetch_get_students['student_guardian']?>
                            </p>
							
						</div>
					</div>
                </div>
				<?php
					endwhile;
				endif;
				?>
			</div>
		</div>
	</div>
	<!--================ End Popular Courses Area =================-->

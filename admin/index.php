<?php include("./inc/header.php")?>
<?php include("./inc/conn.php")?>
    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
		<div class="banner_inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="banner_content">
							<h2>
								Search the student
							</h2>
							<div class="search_course_wrap">
								<form action="index.php" method = "GET" class="form_box d-flex justify-content-between w-100">
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
					<div class="col-lg-6">
						<div class="banner_content">
							<h2>
								Add a student
							</h2>
							<?php
								//Code to add new student to the database
								if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['guardian']) && isset($_POST['class'])){
									if(isset($_FILES['passport'])){
										if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['guardian']) && !empty($_POST['class']) && !empty($_FILES['passport'])){
											$name = $_POST['name'];
											$email = $_POST['email'];
											$guardian = $_POST['guardian'];
											$class = $_POST['class'];
											$passport = $_FILES['passport'];

											//File Upload
											//Getting the  file extension
											$file_name_array = explode('.', $passport['name']);
											$file_extension = strtolower(end($file_name_array));
											//Checking if what is being uploaded is an actual image.
											$allowed_extensions = array('jpg', 'png', 'jpeg');
											if(in_array($file_extension, $allowed_extensions)){
												if($passport['error'] === 0){
													$file_new_name = uniqid($file_name_array[0], true).'.'.$file_extension;
													$file_destination = './passports/'.$file_new_name;
					
													//Send the file to the new directory
													if(move_uploaded_file($passport['tmp_name'], '.'.$file_destination)){
													
														$sql_upload_student_data = "INSERT INTO `all_students` (`student_fullname`, `student_email`, `student_guardian`, `class`, `passport`) VALUES('".$name."', '".$email."', '".$guardian."', '".$class."', '".$file_destination."')";
														$query_upload_student_data = mysqli_query($conn, $sql_upload_student_data);
														echo "<div style = 'text-align: left;'><p class = 'white_back text-success'>Student Added</p></div>";
													}else{
														echo "<div style = 'text-align: left;'><p class = 'text-danger white_back'>Error uploading file</p></div>";
													}
												}else{
													echo "<div style = 'text-align: left;'><p class = 'text-danger white_back'>Error uploading file</p></div>";
												}
											}else{
												echo "<div style = 'text-align: left;'><p class = 'text-danger white_back'>Please, only attempt uploading images of extension 'jpg', 'jpeg', 'png'</p></div>";    
											}
										}else{
											echo "<div style = 'text-align: left;'><p class = 'text-danger white_back'>Please, Complete filling the form before submitting</p></div>"; 
										}
									}else{
										echo "<div style = 'text-align: left;'><p class = 'text-danger white_back'>Please, Select a passport</p></div>"; 
									}
								}
							?>
							<div class="search_course_wrap">
								<form class="row contact_form" enctype = "multipart/form-data" action="index.php" method="POST" id="contactForm" >
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="name" placeholder="Student's full name">
										</div>
										<div class="form-group">
											<input type="email" class="form-control" id="email" name="email" placeholder="Enter student's email address">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" id="guardian" name="guardian" placeholder="Enter guardian's name">
										</div>
										<div class="form-group">
											<input type="text" class="form-control" id="class" name="class" placeholder="Enter student's class">
										</div>
										<div class="row">
											<div class="form-group col-6">
												<!-- <input type="text" class="form-control" placeholder="Card Expiry"> -->
												<label for = "passport" class = "form-control" style = "padding: 10px 17px; font-size: 90%; font-weight: 100">Passport</label>
											</div>
											<div class="form-group col-6">
												<input type="file" class="form-control" id="passport" name="passport">
											</div>
										</div>
									</div>
									<div class="col-md-12 text-center">
										<button type="submit" value="submit" class="btn primary-btn">Add Student</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Home Banner Area =================-->

	<!--================ Start Popular Courses Area =================-->
	<div class="popular_courses lite_bg" id = "students">
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
							<img class="img-fluid w-100" src="<?php echo ".".$fetch_search_students['passport']?>" alt="">
						</div>
						<div class="course_content">
							<h4>
								<a href="student_page.php?student_id=<?php echo $fetch_search_students['id']?>"><?php echo $fetch_search_students['student_fullname']?></a>
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
							<img class="img-fluid w-100" src="<?php echo ".".$fetch_get_students['passport']?>" alt="">
						</div>
						<div class="course_content">
							<h4>
								<a href="student_page.php?student_id=<?php echo $fetch_get_students['id']?>"><?php echo $fetch_get_students['student_fullname']?></a>
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
